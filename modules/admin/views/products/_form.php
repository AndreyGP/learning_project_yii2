<?php

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
        <label class="control-label" for="categories-parent_id">Категория</label>
        <select id="categories-parent_id" class="form-control" name="Categories[parent_id]">
            <option value="0">Выберите категорию</option>
            <?= MenuCategoryWidget::widget(['tpl' => 'list', 'model' => $model]) ?>
        </select>
        <div class="help-block"></div>
    </div>

    <div class="form-group field-categories-parent_id has-success">
        <label class="control-label" for="categories-parent_id">Бренд</label>
        <select id="categories-parent_id" class="form-control" name="Categories[parent_id]">
            <option value="0">Выберите бренд</option>
            <?= BrandMenuWidget::widget(['tpl' => 'list', 'model' => $model]) ?>
        </select>
        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'data_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

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
