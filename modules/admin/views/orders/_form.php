<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList([
        'Принят' => 'Принят',
        'Одобрен' => 'Одобрен',
        'Ожидание оплаты' => 'Ожидание оплаты',
        'Укомплектован' => 'Укомплектован',
        'Доставка в Россию' => 'Доставка в Россию',
        'Доставка по России' => 'Доставка по России',
        'Выполнен' => 'Выполнен', ]) ?>

    <?//= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'black_sum')->textInput(['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'prc')->textInput() ?>

    <?= $form->field($model, 'sum')->textInput(['disabled' => 'disabled']) ?>

    <?//= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'post_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'created_at')->textInput() ?>

    <?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
