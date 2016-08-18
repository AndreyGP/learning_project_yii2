<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 03.08.2016
 * Time: 23:34
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use app\modules\admin\models\Products;
use yii\data\Pagination;
use yii\web\HttpException;
use Yii;

class CategoriesController extends AppController
{
    public function actionIndex()
    {
        $this->setCatMeta('Tatyana Fashion | Стильная одежда',
            'Tatyana Fashion! Интернет магазин стильных женских вещей',
            'Женские вещи, интернет магазин, стильные вещи, скидки, новинки, доставка по России');

        $query = Products::find()
            ->select(['id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
            ->where(['hit' => 1])
            ->orderBy('id DESC');
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 9,
            'forcePageParam' => false,
            'pageSizeParam' => false]);
        $hits = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $session = Yii::$app->session;
        $session->open();
        $this->cartQty = (isset($_SESSION['cart.qty'])) ? $_SESSION['cart.qty'] : false;
        $this->like = (isset($_SESSION['like.qty'])) ? $_SESSION['like.qty'] : false;


        return $this->render('index', compact('hits', 'pages'));
    }

    public function actionView($alias = null)
    {
        if ($alias == null){
            $query = Products::find()
                ->select(['id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
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

            $session = Yii::$app->session;
            $session->open();
            $this->cartQty = (isset($_SESSION['cart.qty'])) ? $_SESSION['cart.qty'] : false;
            $this->like = (isset($_SESSION['like.qty'])) ? $_SESSION['like.qty'] : false;
            $cat_id['title'] = 'Все модели одежды';
            $this->setCatMeta('T-Fashion | ' . $cat_id['title'], 'Модная и стильная одежда у Tatyana Fashion', 'Модная, стильная, одежда, женская, доставка по России, скидки');

            return $this->render('view', compact('products', 'cat_id', 'pages'));
        }

        $cat_id = Category::find()
            ->asArray()
            ->where(['alias' => $alias])
            ->select(['id', 'title', 'keyword', 'description',])
            ->one();
        if (empty($cat_id)){
            throw new HttpException('404', 'Страница не существует');
        }

        $this->setCatMeta('T-Fashion | ' . $cat_id['title'], $cat_id['description'], $cat_id['keyword']);

        $query = Products::find()
        ->select(['id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
        ->where(['category_id' => $cat_id['id']])
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

        $session = Yii::$app->session;
        $session->open();
        $this->cartQty = (isset($_SESSION['cart.qty'])) ? $_SESSION['cart.qty'] : false;
        $this->like = (isset($_SESSION['like.qty'])) ? $_SESSION['like.qty'] : false;

        return $this->render('view', compact('products', 'cat_id', 'pages'));
    }

    public function actionSearch()
    {
        $this->setCatMeta('T-Fashion | Результаты поиска' );
        $q = trim(Yii::$app->request->get('q'));
        if (!$q) return $this->render('search');
        $query = Products::find()
            ->select(['id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
            ->where(['LIKE', 'title', $q ])
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
        /*if (empty($products)){
            $cat_id = Category::find()
                ->asArray()
                ->select(['id', 'title'])
                ->where(['LIKE', 'title', $q])
                ->orderBy('id DESC')
                ->all();
        }*/

        $session = Yii::$app->session;
        $session->open();
        $this->cartQty = (isset($_SESSION['cart.qty'])) ? $_SESSION['cart.qty'] : false;
        $this->like = (isset($_SESSION['like.qty'])) ? $_SESSION['like.qty'] : false;

        return $this->render('search', compact('products', 'pages', 'q'));
    }
}