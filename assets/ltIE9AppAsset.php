<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 01.08.2016
 * Time: 15:05
 */

namespace app\assets;


use yii\web\AssetBundle;

class ltIE9AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    /*public $css = [

    ];*/
    public $js = [
        'js/html5shiv.js',
        'js/respond.min.js',
    ];
    public $jsOptions = [
        'condition' => 'lt IE 9',
        'position' => \yii\web\View::POS_HEAD,
    ];
    /*public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];*/
}