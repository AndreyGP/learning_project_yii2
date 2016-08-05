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
use yii\data\Pagination;
use yii\web\HttpException;
use Yii;

class CategoriesController extends AppController
{
    public function actionIndex()
    {
        $this->setCatMeta('Ты в стиле! | Стильная одежда',
            'Ты в стиле! Интернет магазин стильных женских вещей',
            'Женские вещи, интернет магазин, стильные вещи, скидки, новинки, доставка по России');

        $query = Product::find()
            ->asArray()
            ->select(['id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
            ->where(['hit' => 1])
            ->orderBy('id DESC');
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 6,
            'forcePageParam' => false,
            'pageSizeParam' => false]);
        $hits = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', compact('hits', 'pages'));
    }

    public function actionView($alias)
    {
        $cat_id = Category::find()
            ->asArray()
            ->where(['alias' => $alias])
            ->select(['id', 'title', 'keyword', 'description',])
            ->one();
        if (empty($cat_id)){
            throw new HttpException('404', 'Страница не существует');
        }

        $this->setCatMeta('Ты в стиле! | ' . $cat_id['title'], $cat_id['description'], $cat_id['keyword']);

        $query = Product::find()
            ->asArray()
            ->select(['id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
            ->where(['category_id' => $cat_id['id']])
            ->orderBy('id DESC');
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 6,
            'forcePageParam' => false,
            'pageSizeParam' => false]);
        $products = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        //debug($products);
        return $this->render('view', compact('products', 'cat_id', 'pages'));
    }

    public function actionSearch()
    {
        $this->setCatMeta('Ты в стиле! | Результаты поиска' );
        $q = trim(Yii::$app->request->get('q'));
        if (!$q) return $this->render('search');
        $query = Product::find()
            ->asArray()
            ->select(['id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
            ->where(['LIKE', 'title', $q ])
            ->orderBy('id DESC');
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 6,
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

        //debug($cat_id);
        return $this->render('search', compact('products', 'pages', 'q'));
    }
}