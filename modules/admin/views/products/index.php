<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'img_zoom',
            [
                'attribute' => 'img_zoom',
                'value' => function($data)
                {
                    return '<img src="' . $data->img_zoom  . '" width="150px">';
                },
                'format' => 'raw',
            ],
            'title',
            'vendor_code',
            // 'category_id',
            [
                'attribute' => 'category_id',
                'value' => function($data)
                {
                    return $data->categoriesproducts->title;
                }
            ],
            // 'brand_id',
            [
                'attribute' => 'brand_id',
                'value' => function($data)
                {
                    return $data->brandsproducts->title;
                }
            ],
            // 'data_title',
            // 'body:ntext',
            // 'data_description',
            // 'keyword',
            'price',
            // 'img',
            // 'img_400',
            // 'h_img_400',
            // 'is_new',
            [
                'attribute' => 'is_new',
                'value' => function($data)
                {
                    return !$data->is_new
                            ? '<span style="color: red">Нет</span>'
                            : '<span style="color: green">Да</span>';
                },
                'format' => 'raw',
            ],
            // 'in_stock',
            [
                'attribute' => 'in_stock',
                'value' => function($data)
                {
                    return !$data->in_stock
                        ? '<span style="color: red">Нет</span>'
                        : '<span style="color: green">Да</span>';
                },
                'format' => 'raw',
            ],
            // hit',
            [
                'attribute' => 'hit',
                'value' => function($data)
                {
                    return !$data->hit
                        ? '<span style="color: red">Нет</span>'
                        : '<span style="color: green">Да</span>';
                },
                'format' => 'raw',
            ],
            // 'recomended',
            [
                'attribute' => 'recomended',
                'value' => function($data)
                {
                    return !$data->recomended
                        ? '<span style="color: red">Нет</span>'
                        : '<span style="color: green">Да</span>';
                },
                'format' => 'raw',
            ],
            // 'discount',
            [
                'attribute' => 'discount',
                'value' => function($data)
                {
                    return !$data->discount
                        ? '<span style="color: red">Нет</span>'
                        : '<span style="color: green">Да</span>';
                },
                'format' => 'raw',
            ],
            'raiting',
            'rait_count',
            // 'created',
            // 'modified',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
