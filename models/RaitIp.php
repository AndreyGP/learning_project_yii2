<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "rait_ip".
 *
 * @property integer $id
 * @property string $ip
 * @property integer $product_id
 * @property string $created
 */
class RaitIp extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rait_ip';
    }


    public function getProdRaiting()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created'],
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
            [['ip', 'product_id'], 'required'],
            [['product_id'], 'integer'],
            [['created'], 'safe'],
            [['ip'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id пользователя',
            'ip' => 'ip пользователя',
            'product_id' => 'id товара',
            'created' => 'Добавлен',
        ];
    }
}
