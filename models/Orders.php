<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $status
 * @property integer $qty
 * @property integer $black_sum
 * @property integer $prc
 * @property double $sum
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $post_id
 * @property string $comment
 * @property string $created_at
 * @property string $updated_at
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID заказа',
            'status' => 'Текущий статус заказа',
            'qty' => 'Количество товара ',
            'black_sum' => 'Сумма без скидки',
            'prc' => 'Скидка',
            'sum' => 'Сумма',
            'name' => 'Отправлено на имя',
            'email' => 'Ваш email',
            'phone' => 'Ваш № телефона',
            'address' => 'Адрес доставки',
            'post_id' => 'ID почтового отправления',
            'comment' => 'Комментарий менеджера',
            'created_at' => 'Заказ создан',
            'updated_at' => 'Последнее обновление',
        ];
    }
}
