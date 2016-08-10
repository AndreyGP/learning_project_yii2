<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 04.08.2016
 * Time: 0:39
 */

namespace app\controllers;
use app\models\Product;
use app\models\Category;
use yii\web\HttpException;
use Yii;


class ProductsController extends AppController
{
    public function actionView($id)
    {
        //$id = Yii::$app->request->get('id');
        if (!is_int((int)$id)){
            throw new HttpException('404', 'Страница не существует');
        }

        $product = Product::find()
            ->asArray()
            ->with('categories')
            ->where(['id' => $id])
            ->one();
        if (empty($product)){
            throw new HttpException('404', 'Страница не существует');
        }

        $this->setProdMeta('Ты в стиле! | ' . $product['title'],
            $product['data_title'],
            $product['data_description'],
            $product['keyword'],
            $product['img_zoom']);

        $hits = Product::find()
            ->asArray()
            ->select(['id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
            ->where(['hit' => 1])
            ->orderBy('id DESC')
            ->limit(12)
            ->all();
        $recomend = Product::find()
            ->asArray()
            ->select(['id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
            ->where(['recomended' => 1])
            ->orderBy('id DESC')
            ->limit(12)
            ->all();

        return $this->render('view', compact('product', 'hits', 'recomend'));


    }
}