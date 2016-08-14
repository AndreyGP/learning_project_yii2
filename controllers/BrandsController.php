<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 13.08.2016
 * Time: 14:20
 */

namespace app\controllers;
use app\models\Brand;
use app\models\Product;
use yii\data\Pagination;
use Yii;

class BrandsController extends AppController
{
    public function actionView($title = null)
    {
        $session = Yii::$app->session;
        $session->open();
        $this->cartQty = (isset($_SESSION['cart.qty'])) ? $_SESSION['cart.qty'] : false;
        $this->like = (isset($_SESSION['like.qty'])) ? $_SESSION['like.qty'] : false;

        $brand = Brand::find()
            ->asArray()
            ->where(['title' => $title])
            ->one();
        $this->setCatMeta('T-Fashion | ' . $brand['title'], $brand['description'], $brand['keyword']);

        $query = Product::find()
            ->asArray()
            ->select(['id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
            ->where(['brand_id' => $brand['id']])
            ->orderBy('id DESC');
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 12,
            'forcePageParam' => false,
            'pageSizeParam' => false]);
        $products = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $cat_id['title'] = mb_strtoupper($brand['title']);

        return $this->render('view', compact('products', 'cat_id', 'pages'));
    }
}