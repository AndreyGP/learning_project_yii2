<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 13.08.2016
 * Time: 21:18
 */

namespace app\controllers;
use app\models\Like;
use app\models\Product;
use app\models\Cart;
use app\modules\admin\models\Products;
use Yii;

class LikeController extends AppController
{
    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        if (empty($session['like'])){
            return false;
        }
        return $this->render('like_modal', compact('session'));
    }

    public function actionAdd($id, $qty = 1)
    {
        $product = Products::find()
            ->select(['id', 'title', 'vendor_code', 'price', 'img_zoom'])
            ->where(['id' => $id])
            ->one();
        if (empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Like();
        $cart->addToLike($product, $qty);
        if (!Yii::$app->request->isAjax){
            return $this->redirect(Yii::$app->request->referrer);
        }
        $this->layout = false;

        return $this->render('like_modal', compact('session'));
    }

    public function actionDelete($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = new Like();
        $cart->deleteFromLIke($id);
        if (!Yii::$app->request->isAjax){
            return $this->redirect(Yii::$app->request->referrer);
        }
        $this->layout = false;
        return $this->render('like_modal', compact('session'));
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        $session->remove('like');
        $session->remove('like.qty');
        $session->remove('like.sum');

        return $this->render('like_modal', compact('session'));
    }
}