<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'status',
            [
                'attribute' => 'status',
                'value' => function($data)
                {
                    switch ($data->status){
                        case 'Принят':
                            return '<span style="color: red">Принят</span>';
                        case 'Одобрен':
                            return '<span style="color: yellow">Одобрен</span>';
                        case 'Ожидание оплаты':
                            return '<span style="color: aqua">Ожидание оплаты</span>';
                        case 'Укомплектован':
                            return '<span style="color: blue">Укомплектован</span>';
                        case 'Доставка в Россию':
                            return '<span style="color: greenyellow">Доставка в Россию</span>';
                        case 'Доставка по России':
                            return '<span style="color: yellowgreen">Доставка по России</span>';
                        default:
                            return '<span style="color: green">Выполнен</span>';
                    }
                },
                'format' => 'raw',
            ],
            'qty',
            //'black_sum',
            //'prc',
            'sum',
            'name',
            // 'email:email',
            'phone',
            // 'address:ntext',
            // 'post_id',
            // 'comment:ntext',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

