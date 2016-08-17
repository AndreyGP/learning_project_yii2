<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
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

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-9419103276015408",
            enable_page_level_ads: true
        });
    </script>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>


    <link rel="shortcut icon" href="/web/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/web/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/web/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/web/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/web/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php $this->beginBody() ?>

<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="tel:+7(000)-000-00-00"><i class="fa fa-phone"></i> +7(928)-007-18-90</a></li>
                            <li><a href="mailto:info@tatyana-fashion.ru"><i class="fa fa-envelope"></i> info@tatyana-fashion.ru</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-odnoklassniki"></i></a></li>
                            <li><a href="#"><i class="fa fa-vk"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
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
<?php if (!Yii::$app->user->isGuest):?>
                            <li><i class="fa fa-user"></i>
                               <?php echo Yii::$app->user->identity['name'] . ' - ' . Yii::$app->user->identity['role'];?>
                            </li>
                            <li><a href="<?= Url::to(['/admin'])?>"><i class="glyphicon glyphicon-home"></i> Админка</a></li>
                            <li><a href="<?= Url::to(['/logout'])?>"><i class="glyphicon glyphicon-log-in"></i> Выход</a></li>
<?php else:?>
                            <li>
                                <a href="#" id="likeOn"><i class="fa fa-star" <?php if ($this->context->like > 0) echo 'style="color: #FE980F"';?> >
                                    </i> Избранное<span class="badge like_badge"><?php echo $this->context->like; ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['/cart/order'])?>" id="cartOn"><i class="fa fa-shopping-cart cart-yes" <?php if ($this->context->cartQty > 0) echo 'style="color: #008000"';?>>
                                    </i>Корзина<span class="badge cart_badge"><?php echo $this->context->cartQty; ?></span>
                                </a>
                            </li>
                            <li><a href="<?= Url::to(['/admin'])?>"><i class="fa fa-lock"></i> Войти</a></li>
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
                            <li><a href="/" class="active">Главная</a></li>
                            <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?= Url::to(['/category'])?>">Все товары</a></li>
                                    <li><a href="<?= Url::to(['/cart/order'])?>">Корзина</a></li>
                                    <li><a href="<?= Url::to(['/admin'])?>">Войти</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">О нас</i></a>
                                <!--ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul-->
                            </li>
                            <li><a href="#">Отзывы</a></li>
                            <li><a href="#">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form method="get" action="<?php echo Url::to(['categories/search']);?>">
                            <input type="text" placeholder="Поиск" name="q"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<?= $content; ?>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>T</span>-<span>F</span>ashion</h2>
                        <p>Приобретая у нас одежду, Вы можете быть уверены, что в Вы окажитесь среди самых стильных</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <div class="iframe-img">
                                <img src="/web/images/home/iframe1.png" alt="" />
                            </div>
                            <p>Выделяться из всех</p>
                            <h2>Tatyana Fashion</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <div class="iframe-img">
                                <img src="/web/images/home/iframe2.png" alt="" />
                            </div>
                            <p>Всегда есть что одеть</p>
                            <h2>Tatyana Fashion</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <div class="iframe-img">
                                <img src="/web/images/home/iframe3.png" alt="" />
                            </div>
                            <p>На все случаи жизни</p>
                            <h2>Tatyana Fashion</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <div class="iframe-img">
                                <img src="/web/images/home/iframe4.png" alt="" />
                            </div>
                            <p>Гибкая система скидок</p>
                            <h2>Tatyana Fashion</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="/web/images/home/map.png" alt="" />
                        <p>Лучшая одежда со всего мира. Современный стиль для каждого.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="single-widget">
                        <h2>Обслуживание</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Онлайн помощь</a></li>
                            <li><a href="#">Свяжитесь с нами</a></li>
                            <li><a href="#">Статус заказа</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <!--div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div-->
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>О Tatyana Fashion</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Ваш email адрес" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Получайте самые последние обновления с нашего сайта и обновляйте себя в новом стиле...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2016 Tatyana Fashion. Все права защищены.</p>
                <!--p class="pull-right">Изготовление сайтов <span><a target="_blank" href="http://www.takeyousite.ru">Take You site</a></span></p-->
            </div>
        </div>
    </div>

</footer><!--/Footer-->

<?php $this->endBody() ?>

</body>
<!-- Cart modal windows-->
<?php
Modal::begin([
    'header' => '<h2>Ваша Корзина</h2>',
    'footer' => '<button type="button" class="btn btn-danger" id="clearCart">Очистить корзину</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                 <a href="/cart/order" class="btn btn-success" id="cartPay"><b>Оформить заказ</b></a>',
    'size' => 'modal-lg',
    'id' => 'cart'
]);
Modal::end();


Modal::begin([
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>',
    'size' => 'modal-lg',
    'id' => 'cartNo'
]);
?>
<center>
    <h2>Корзина пуста...</h2>
    <img src="/web/images/netu.jpg" alt="Ку..." width="350">
</center>
<?php
Modal::end();

?>
<!-- /Cart modal windows-->
<!-- Like modal windows-->
<?php
Modal::begin([
    'header' => '<h2>Вам понравилось</h2>',
    'footer' => '<button type="button" class="btn btn-danger" id="clearLike">Очистить</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                 <a href="/cart/order" class="btn btn-success" id="addToCart"><b>Добавить в корзину</b></a>',
    'size' => 'modal-lg',
    'id' => 'like'
]);
Modal::end();


Modal::begin([
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>',
    'size' => 'modal-lg',
    'id' => 'likeNo'
]);
?>
<center>
    <h2>Вы ничего не отметили в избранное...</h2>
    <img src="/web/images/netu.jpg" alt="Ку..." width="350">
</center>
<?php
Modal::end();

?>
<!-- /Like modal windows-->
<?php if (isset($this->context->raiting)): ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#jRateRead").jRate({
            rating: <?php echo $this->context->raiting; ?>,
            shapeGap: '5px',
            width: 12,
            height: 12,
            startColor: '#FE980F',
            endColor: '#FE980F',
            readOnly: true
        });
    });
</script>
<?php endif;?>
<!--LiveInternet logo-->
<a href="#"
   target="_blank"><img src="//counter.yadro.ru/logo?14.1"
                        title="LiveInternet: показано число просмотров за 24 часа, посетителей за 24 часа и за сегодня"
                        alt="" style="border: 0;" width="88" height="31"/></a>
<!--/LiveInternet-->
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
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = 'ZOmeHwJZpY';var d=document;var w=window;function l(){
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
</html>
<?php $this->endPage() ?>