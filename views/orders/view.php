<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = 'Статус заказа ID: ' . $model->id ;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view container" style="text-align: left">

    <h1><?= $this->title ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'status',
            [
                'attribute' => 'status',
                'value' => ($model->status == 'Принят')
                    ? '<span style="color: red">Принят</span>'
                    : '<span style="color: green">' . $model->status . '</span>',
                'format' => 'raw',
            ],
            // 'qty',
            // 'black_sum',
            // 'prc',
            // 'sum',
            // 'name',
            // 'email:email',
            // 'phone',
            // 'address:ntext',
            'post_id',
            'comment:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

