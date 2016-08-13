<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 04.08.2016
 * Time: 0:37
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{
    public $raiting;
    public $cartQty;
    public $like;

    protected function setCatMeta($cat_title = null, $cat_description = null, $cat_keywords = null)
    {
        $this->view->title = $cat_title;
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$cat_description"]);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$cat_keywords"]);
    }

    protected function setProdMeta($prod_title = null, $data_title = null, $data_description = null,
                                   $prod_keywords = null, $prod_img = null)
    {
        $this->view->title = $prod_title;
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$data_description"]);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$prod_keywords"]);
        $this->view->registerMetaTag(['name' => 'title', 'content' => "$data_title"]);
        $this->view->registerMetaTag(['rel' => 'image_src', 'content' => "$prod_img"]);
        $this->view->registerMetaTag(['property' => 'og:title', 'content' => "$data_title"]);
        $this->view->registerMetaTag(['property' => 'og:description', 'content' => "$data_description"]);
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => "$prod_img"]);
    }
}