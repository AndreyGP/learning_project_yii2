<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\NavBar;
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
                                <li><a href="/"><i class="glyphicon glyphicon-eye-open"></i> На сайт</a></li>
                                <li><a href="/admin/orders" id="likeOn"><i class="fa fa-shopping-cart"></i> Заказы</a> </li>
<?php if (!Yii::$app->user->isGuest):?>
                                <li><a href="/site/logout"><i class="glyphicon glyphicon-log-in"></i> Выход</a></li>
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

                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

    <?= $content; ?>

    <footer id="footer"><!--Footer-->

    </footer><!--/Footer-->

    <?php $this->endBody() ?>

    </body>

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