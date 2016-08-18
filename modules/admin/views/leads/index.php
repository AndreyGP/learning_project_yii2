<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подписчики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leads-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Всего подписчиков : <b style="color: #ff0000"><?= Html::encode($count) ?></b></h3>

    <p>
        <?= Html::a('Написать всем', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Ответить клиенту', ['mail'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'email:email',
            'created',
            //'modified',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
