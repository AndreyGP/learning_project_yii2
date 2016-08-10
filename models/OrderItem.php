<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order_items".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property string $name
 * @property double $price
 * @property integer $qty_item
 * @property double $summ_item
 */
class OrderItem extends AppActiveModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'name', 'price', 'qty_item', 'summ_item'], 'required'],
            [['order_id', 'product_id', 'qty_item'], 'integer'],
            [['price', 'summ_item'], 'number'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    public function getOrders()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

}
