<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поиск заказа';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index container">

    <hr />
    <h1 style="text-align: center"><?= Html::encode($this->title) ?></h1>
    <hr />
    <center>
        <?php $form = ActiveForm::begin([
            'action' => '/orders/view',
            'method' => 'GET'
        ]); ?>
        <p>Введите ID Вашего заказа</p>
        <?php echo Html::input('text', 'id', null, [
            'placeholder' => 'Введите ID заказа',
            'required' => 'required'
        ]);?>
        <p></p>
        <p>
            <?php echo Html::submitButton('Посмотреть', [
                'class' => 'btn btn-warning',
                'id' => 'orderButton'
            ]);?>
        </p>
        <?php ActiveForm::end(); ?>
    </center>
    <hr />
    <div style="margin-top: 50px"></div>
</div>

