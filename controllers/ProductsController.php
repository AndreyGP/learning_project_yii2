<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 04.08.2016
 * Time: 0:39
 */

namespace app\controllers;
use app\models\Product;
use yii\data\Pagination;
//use app\models\Category;
use app\models\RaitIp;
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
        $this->raiting = $product['raiting'] / $product['rait_count'];
        $session = Yii::$app->session;
        $session->open();
        $this->cartQty = (isset($_SESSION['cart.qty'])) ? $_SESSION['cart.qty'] : false;
        $this->like = (isset($_SESSION['like.qty'])) ? $_SESSION['like.qty'] : false;

        $this->setProdMeta('T-Fashion | ' . $product['title'],
            $product['data_title'],
            $product['data_description'],
            $product['keyword'],
            $product['img_zoom']);

        $ip = $_SERVER['REMOTE_ADDR'];
        $user = RaitIp::find()
            ->asArray()
            ->where(['product_id' => $id, 'ip' => $ip])
            ->one();
        if (empty($user)){
            $raiting = false;
        } else {
            $raiting = true;
        }

        return $this->render('view', compact('product', 'raiting', 'ip'));


    }

    public function actionRait($id = null, $rait = null, $ip = null)
    {
        $product = Product::find()
            ->where(['id' => $id])
            ->select(['id', 'raiting', 'rait_count'])
            ->one();
        $product->raiting = $product->raiting + $rait;
        $product->rait_count = $product->rait_count + 1;

        $rait_ip = new RaitIp();
        $rait_ip->ip = $ip;
        $rait_ip->product_id = $id;

        if ($product->save() && $rait_ip->save()) return true;
    }

    public function actionNovelty()
    {
        $query = Product::find()
            ->asArray()
            ->where(['is_new' => 1])
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

        $cat_id['title'] = 'Новинки месяца';
        $this->setCatMeta('T-Fashion | ' . $cat_id['title'],
            'Модная и стильная одежда у Tatyana Fashion',
            'Модная, стильная, одежда, женская, доставка по России, скидки');

        return $this->render('novelty', compact('products', 'cat_id', 'pages'));
    }

    public function actionDiscount()
    {
        $query = Product::find()
            ->asArray()
            ->where(['discount' => 1])
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

        $cat_id['title'] = 'Акции и скидки';
        $this->setCatMeta('T-Fashion | ' . $cat_id['title'],
            'Модная и стильная одежда у Tatyana Fashion',
            'Модная, стильная, одежда, женская, доставка по России, скидки');

        return $this->render('novelty', compact('products', 'cat_id', 'pages'));
    }
}