<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 18.08.2016
 * Time: 6:03
 */

namespace app\controllers;
use Yii;

class ContactsController extends AppController
{
    public function actionIndex()
    {
        $this->setCatMeta('T-Fashion | Контакты',
            'Модная и стильная одежда у Tatyana Fashion',
            'Модная, стильная, одежда, женская, доставка по России, скидки');
        $session = Yii::$app->session;
        $session->open();
        $this->cartQty = (isset($_SESSION['cart.qty'])) ? $_SESSION['cart.qty'] : false;
        $this->like = (isset($_SESSION['like.qty'])) ? $_SESSION['like.qty'] : false;
        return $this->render('index');
    }
}