<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MenuCategoryWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group field-categories-parent_id has-success">
        <label class="control-label" for="categories-parent_id">Родительская категория</label>
        <select id="categories-parent_id" class="form-control" name="Categories[parent_id]">
            <option value="0">Самостоятельная категория</option>
            <?= MenuCategoryWidget::widget(['tpl' => 'list', 'model' => $model]) ?>
        </select>
        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true])->textarea() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true])->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
