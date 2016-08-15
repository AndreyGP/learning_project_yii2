<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orders */

$this->title = 'Заказ: ID: ' . $model->id . ', Клиент: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'status',
            'qty',
            'black_sum',
            'prc',
            'sum',
            'name',
            'email:email',
            'phone',
            'address:ntext',
            'post_id',
            'comment:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <?php $items = $model->adminOrderItems; //  debug($model);?>
        <div class="container nopadding" id="cart_items" style="text-align: center">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">№</td>
                        <td class="description">Товар</td>
                        <td class="price">Цена</td>
                        <td class="quantity">Количество</td>
                        <td class="total">Всего</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $n = 1; foreach($items as $id => $item):?>
                        <tr>
                            <td class="cart_product"><?php echo $n;?></td>
                            <td class="cart_description">
                                <h4><a href="/product/<?php echo $item->product_id;?>"><?php echo $item->name;?></a></h4>
                            </td>
                            <td class="cart_price">
                                <p><?php echo $item->price;?></p>
                            </td>
                            <td class="cart_quantity">
                                <p><?php echo $item->qty_item;?></p>
                            <td class="cart_total">
                                <p class="cart_total_price"><?php echo $item->summ_item ;?></p>
                            </td>
                        </tr>
                    <?php $n++; endforeach; ?>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result" style="font-weight: bolder; font-size: 16px;">
                                <tr>
                                    <td>Всего вещей: </td>
                                    <td><?php echo $model->qty;?></td>
                                </tr>
                                <tr>
                                    <td>На сумму: </td>
                                    <td><?php echo $model->black_sum;?></td>
                                </tr>
                                <tr>
                                    <td>Скидка: </td>
                                    <td><?php echo $model->prc . '%';?></td>
                                </tr>
                                <tr>
                                    <td>К оплате: </td>
                                    <td><span><?php echo $model->sum;?></span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>