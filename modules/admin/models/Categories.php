<?php

namespace app\modules\admin\models;
use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $title
 * @property integer $parent_id
 * @property string $alias
 * @property string $keyword
 * @property string $description
 */
class Categories extends AppAdminActiveModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    public function getCategories()
    {
        return $this->hasOne(Categories::className(), ['id' => 'parent_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['parent_id'], 'integer'],
            [['title', 'keyword', 'description'], 'string', 'max' => 255],
            [['alias'], 'string', 'max' => 254],
            [['alias'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название категории',
            'parent_id' => 'Родительская категория',
            'alias' => 'Псевдоним для URL',
            'keyword' => 'Ключевики для поисковика',
            'description' => 'Описание для поисковика',
        ];
    }
}
