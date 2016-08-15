<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "brands".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $keyword
 */
class Brands extends \app\modules\admin\models\AppAdminActiveModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 100],
            [['description', 'keyword'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'title' => 'Название бренда',
            'description' => 'Описание для поисковиков',
            'keyword' => 'Ключевые слова для поисковиков',
        ];
    }
}
