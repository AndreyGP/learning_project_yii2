<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'img_zoom',
            [
                'attribute' => 'img_zoom',
                'value' => '<img src="' . $model->img_zoom  . '" width="150px"> <img src="' . $model->img_zoom  . '" width="150px"> <img src="' . $model->img_zoom  . '" width="150px">',
                'format' => 'raw',
            ],
            'title',
            'vendor_code',
            // 'category_id',
            [
                'attribute' => 'category_id',
                'value' => $model->categoriesproducts->title
            ],
            // 'brand_id',
            [
                'attribute' => 'brand_id',
                'value' => mb_strtoupper($model->brandsproducts->title),
            ],
            'data_title',
            // 'body:ntext',
            [
                'attribute' => 'body',
                'value' => $model->body,
                'format' => 'raw',
            ],
            'data_description',
            'keyword',
            'price',
            // 'img',
            // 'img_400',
            // 'h_img_400',
            // 'is_new',
            [
                'attribute' => 'is_new',
                'value' => !$model->is_new
                    ? '<span class="text-danger">Нет</span>'
                    : '<span class="text-success">Да</span>',
                'format' => 'raw',
            ],
            // 'in_stock',
            [
                'attribute' => 'in_stock',
                'value' => !$model->in_stock
                    ? '<span class="text-danger">Нет</span>'
                    : '<span class="text-success">Да</span>',
                'format' => 'raw',
            ],
            // hit',
            [
                'attribute' => 'hit',
                'value' => !$model->hit
                    ? '<span class="text-danger">Нет</span>'
                    : '<span class="text-success">Да</span>',
                'format' => 'raw',
            ],
            // 'recomended',
            [
                'attribute' => 'recomended',
                'value' => !$model->recomended
                    ? '<span class="text-danger">Нет</span>'
                    : '<span class="text-success">Да</span>',
                'format' => 'raw',
            ],
            // 'discount',
            [
                'attribute' => 'discount',
                'value' => !$model->discount
                        ? '<span class="text-danger">Нет</span>'
                        : '<span class="text-success">Да</span>',
                'format' => 'raw',
            ],
            'raiting',
            'rait_count',
            'created',
            // 'modified',
        ],
    ]) ?>

</div>
