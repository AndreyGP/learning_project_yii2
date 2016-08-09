<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 08.08.2016
 * Time: 0:02
 */

namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use Yii;

class CartController extends AppController
{
    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;

        return $this->render('cart_modal', compact('session'));
    }

    public function actionAdd($id, $qty = 1)
    {
        $product = Product::find()
            ->select(['id', 'title', 'vendor_code', 'price', 'img_zoom'])
            ->asArray()
            ->where(['id' => $id])
            ->one();
        if (empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        $this->layout = false;

        return $this->render('cart_modal', compact('session'));
    }

    public function actionRecalc($id, $action)
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        $cart = new Cart();
        $cart->recalculationCart($id, $action);

        return $this->render('cart_modal', compact('session'));
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        return $this->render('cart_modal', compact('session'));
    }

    public function actionDelete($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        $cart = new Cart();
        $cart->deleteFromCart($id);

        return $this->render('cart_modal', compact('session'));
    }
}