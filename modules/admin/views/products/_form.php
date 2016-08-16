<?php
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);
use yii\helpers\Html;
use yii\widgets\ActiveForm;
Use app\components\MenuCategoryWidget;
Use app\components\BrandMenuWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vendor_code')->textInput(['disabled' => 'disabled']) ?>

    <div class="form-group field-categories-parent_id has-success">
        <label class="control-label" for="products_category_id">Категория</label>
        <select id="products_category_id" class="form-control" name="Products[category_id]">
            <option value="0">Выберите категорию</option>
            <?= MenuCategoryWidget::widget(['tpl' => 'list', 'model' => $model]) ?>
        </select>
        <div class="help-block"></div>
    </div>

    <div class="form-group field-categories-parent_id has-success">
        <label class="control-label" for="products_brand_id">Бренд</label>
        <select id="products_brand_id" class="form-control" name="Products[brand_id]">
            <option value="0">Выберите бренд</option>
            <?= BrandMenuWidget::widget(['tpl' => 'list', 'model' => $model]) ?>
        </select>
        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'data_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ]
      ),
    ]); ?>

    <?= $form->field($model, 'data_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['type' => 'number', 'step' => 100]) ?>

    <?= $form->field($model, 'is_new')->checkbox() ?>

    <?= $form->field($model, 'in_stock')->checkbox() ?>

    <?= $form->field($model, 'hit')->checkbox() ?>

    <?= $form->field($model, 'recomended')->checkbox() ?>

    <?= $form->field($model, 'discount')->checkbox() ?>

    <?//= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'img_400')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'h_img_400')->textInput() ?>

    <?//= $form->field($model, 'img_zoom')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'raiting')->textInput() ?>

    <?//= $form->field($model, 'rait_count')->textInput() ?>

    <?//= $form->field($model, 'created')->textInput() ?>

    <?//= $form->field($model, 'modified')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
