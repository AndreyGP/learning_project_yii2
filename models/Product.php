<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 03.08.2016
 * Time: 0:54
 */

namespace app\models;


class Product extends AppActiveModel
{
    public static function tableName()
    {
        return 'products';
    }

    public function getCategories()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getBrands()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    public function getRaiting()
    {
        return $this->hasMany(RaitIp::className(), ['product_id' => 'id']);
    }
}