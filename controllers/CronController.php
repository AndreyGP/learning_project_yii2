<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 18.08.2016
 * Time: 21:21
 */

namespace app\controllers;
use Yii;

class CronController extends AppController
{
    public function actionNew()
    {
        $db = mysqli_connect('localhost', 'lrmggjqi_mng', 'H3c2O8r7', 'lrmggjqi_tf');
        $sql = "UPDATE `products` SET `is_new`=0 WHERE (NOW() - `created`) >= 2628000;";
        $res = mysqli_query($db, $sql);
        $count = mysqli_affected_rows($res);

        // $to = 'tanyakhonya@gmail.com';
        // $subject = 'Новинки - изменение статуса товаров';
        // $headers  = 'MIME-Version: 1.0' . "\r\n";
        // $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        // $headers .= 'From: Tatyana Fashion <no-reply@tatyana-fashion.ru>' . "\r\n";

        ob_start();
        include __DIR__ . '/mail/new.php';
        $message = ob_get_clean();

        // Отправляем
        // mail($to, $subject, $message, $headers);
        Yii::$app->mailer->compose()
            ->setFrom(['no-reply@tatyana-fashion.ru' => 'Tatyana Fashion'])
            ->setTo('tanyakhonya@gmail.com')
            ->setSubject('Новинки - изменение статуса товаров')
            ->setHtmlBody($message)
            ->send();
    }

    public function actionPopular()
    {
        $db = mysqli_connect('localhost', 'lrmggjqi_mng', 'H3c2O8r7', 'lrmggjqi_tf');
        $sqlup = "UPDATE `products` SET `hit`=1 WHERE (`raiting` / `rait_count`) >= 3.8";
        $sqldown = "UPDATE `products` SET `hit`=0 WHERE (`raiting` / `rait_count`) <= 3.7";
        mysqli_query($db, $sqlup);
        mysqli_query($db, $sqldown);
    }
}