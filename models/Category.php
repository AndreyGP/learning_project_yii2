<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 02.08.2016
 * Time: 22:35
 */

namespace app\models;


class Category extends AppActiveModel
{
    public static function tableName()
    {
        return 'categories';
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}