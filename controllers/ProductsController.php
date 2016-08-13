<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 04.08.2016
 * Time: 0:39
 */

namespace app\controllers;
use app\models\Product;
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
        $this->cartQty = $_SESSION['cart.qty'];

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
}