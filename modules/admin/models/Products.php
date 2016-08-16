<?php

namespace app\modules\admin\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property integer $vendor_code
 * @property integer $category_id
 * @property integer $brand_id
 * @property string $title
 * @property string $data_title
 * @property string $body
 * @property string $data_description
 * @property string $keyword
 * @property double $price
 * @property string $img
 * @property string $img_400
 * @property integer $h_img_400
 * @property string $img_zoom
 * @property integer $is_new
 * @property integer $in_stock
 * @property integer $hit
 * @property integer $recomended
 * @property integer $discount
 * @property double $raiting
 * @property integer $rait_count
 * @property string $created
 * @property string $modified
 */
class Products extends \app\modules\admin\models\AppAdminActiveModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created', 'modified'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['modified'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getBrandsproducts()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }

    public function getCategoriesproducts()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_code', 'category_id', 'brand_id', 'h_img_400', 'is_new', 'in_stock', 'hit', 'recomended', 'discount', 'rait_count'], 'integer'],
            [['category_id', 'brand_id', 'title', 'raiting', 'rait_count'], 'required'],
            [['body'], 'string'],
            [['price', 'raiting'], 'number'],
            [['created', 'modified'], 'safe'],
            [['title', 'keyword', 'img', 'img_400', 'img_zoom'], 'string', 'max' => 255],
            [['data_title', 'data_description'], 'string', 'max' => 254],
            [['vendor_code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id товара',
            'vendor_code' => 'Артикуль',
            'category_id' => 'Категория',
            'brand_id' => 'Бренд',
            'title' => 'Название',
            'data_title' => 'Название для Поделиться',
            'body' => 'Описание товара',
            'data_description' => 'Описание для Поделиться и Поисковиков',
            'keyword' => 'Ключевики для поисковиков',
            'price' => 'Цена',
            'img' => 'Изображение',
            'img_400' => 'Изображение карточки статик',
            'h_img_400' => 'Высота текущего изобращения',
            'img_zoom' => 'Фото',
            'is_new' => 'Новинка',
            'in_stock' => 'Наличие',
            'hit' => 'Популярный',
            'recomended' => 'Рекомендуем',
            'discount' => 'Скидка',
            'raiting' => 'Рейтинг',
            'rait_count' => 'Голосов',
            'created' => 'Добавлено',
            'modified' => 'Изменено',
        ];
    }
}
