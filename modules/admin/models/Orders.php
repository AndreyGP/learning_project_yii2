<?php

namespace app\modules\admin\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
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
class Orders extends AppAdminActiveModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    public function getAdminOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'address', 'comment'], 'string'],
            [['qty', 'black_sum', 'prc', 'sum', 'name', 'email', 'phone', 'address', 'created_at', 'updated_at'], 'required'],
            [['qty', 'black_sum', 'prc'], 'integer'],
            [['sum'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['email', 'phone', 'post_id'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Статус',
            'qty' => 'Кол-во',
            'black_sum' => 'Сумма без скидки',
            'prc' => 'Скидка %',
            'sum' => 'Итого',
            'name' => 'Ф.И.О.',
            'email' => 'E-mail',
            'phone' => '№ телефона',
            'address' => 'Адрес доставки',
            'post_id' => 'ID отправления',
            'comment' => 'Комментарии менеджера',
            'created_at' => 'Создан',
            'updated_at' => 'Изменён',
        ];
    }
}
