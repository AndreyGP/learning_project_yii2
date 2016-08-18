<?php
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Leads */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leads-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput([
        'maxlength' => true,
        'disabled' => 'disabled',
        'placeholder' => 'Письмо будет отправлено всем подписчикам',
    ]) ?>

    <?= $form->field($model, 'created')->textInput([
        'label' => 'Тема письма',
        'placeholder' => 'Введите тему письма',
        'value' => ''
    ]) ?>

    <?= $form->field($model, 'modified')
        ->textInput(['value' => ''])
        ->widget(CKEditor::className(),[
            'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
                    'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => false, //по умолчанию false
                ]
            ),
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Отправить' : 'Отправить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
