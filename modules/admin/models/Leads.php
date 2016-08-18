<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "leads".
 *
 * @property integer $id
 * @property string $email
 * @property string $created
 * @property string $modified
 */
class Leads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['created', 'modified'], 'safe'],
            [['email'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id подписчика',
            'email' => 'E-mail',
            'created' => '',
            'modified' => 'Текст письма',
        ];
    }
}
