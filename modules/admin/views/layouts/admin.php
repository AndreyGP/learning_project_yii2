<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\ltIE9AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
ltIE9AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>

        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title>Админка | <?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

    </head><!--/head-->

    <body>
    <?php $this->beginBody() ?>

    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="/"><img src="/web/images/home/logo.png" alt="" /></a>
                        </div>

                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><i class="fa fa-user"></i>
                                   <?php echo Yii::$app->user->identity['name'] . ' - ' . Yii::$app->user->identity['role'];?>
                                </li>
                                <li><a href="<?= Url::to(['/'])?>"><i class="glyphicon glyphicon-eye-open"></i> На сайт</a></li>
                                <li><a href="<?= Url::to(['/admin'])?>" ><i class="fa fa-shopping-cart"></i> Заказы</a> </li>
<?php if (!Yii::$app->user->isGuest):?>
                                <li><a href="<?= Url::to(['/site/logout'])?>"><i class="glyphicon glyphicon-log-in"></i> Выход</a></li>
<?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="<?= Url::to(['/admin'])?>" class="active">Главная</a></li>
                                <li class="dropdown"><a href="#">Категории<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?= Url::to(['categories/index'])?>">Список категорий</a></li>
                                        <li><a href="<?= Url::to(['categories/create'])?>">Добавить категорию</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Бренды<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?= Url::to(['brands/index'])?>">Список брендов</a></li>
                                        <li><a href="<?= Url::to(['brands/create'])?>">Добавить бренд</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Товары<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?= Url::to(['products/index'])?>">Список товаров</a></li>
                                        <li><a href="<?= Url::to(['products/create'])?>">Добавить товар</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
<div class="container">
    <?php if (Yii::$app->session->hasFlash('success')):?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo Yii::$app->session->getFlash('success');?>
        </div>
    <?php endif;?>
    <?php if (Yii::$app->session->hasFlash('error')):?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo Yii::$app->session->getFlash('error');?>
        </div>
    <?php endif;?>
    <?= $content; ?>
</div>
    <footer id="footer"><!--Footer-->
        <div class="footer-top" style="height: 50px">
            <div class="container">
            </div>
        </div>
    </footer><!--/Footer-->

    <?php $this->endBody() ?>
    </body>
    <!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter38295485 = new Ya.Metrika({ id:38295485, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/38295485" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
    <!-- Google Analistics counter -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-80202499-1', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- Google Analistics counter -->
    </html>
<?php $this->endPage() ?>