<?php
use app\components\MenuCategoryWidget;
use app\components\BrandMenuWidget;
use app\components\ProductPlusWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
//debug($hits);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <ul class="cat_menu category-products">
                        <?php echo MenuCategoryWidget::widget(['tpl' => 'menu']);?>
                        <hr/>
                        <li><a href="/novinki">Новинки месяца</a></li>
                        <li><a href="/discount">Акции и скидки</a></li>
                    </ul>

                    <div class="brands_products"><!--brands_products-->
                        <?php echo BrandMenuWidget::widget();?>
                    </div><!--/brands_products-->

                    <div class="price-range" ><!--price-range-->
                        <div class="well text-center" style="height: 280px; margin-bottom: 5px; border: none;">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- Ты в стиле сайдбары 2 -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-9419103276015408"
                                 data-ad-slot="2194929578"
                                 data-ad-format="auto"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center" style="height: 350px; background-color: white;"><!--shipping-->
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- Ты в стиле сайдбары -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-9419103276015408"
                             data-ad-slot="6764729977"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product" >
                            <img class = "cloudzoom img_400"
                                 src = "http://tatyana-fashion.ru/img/products/4bcdb9752d0fe56766ed2898356966b5.jpg"
                                 data-cloudzoom = "
                                     zoomImage: 'http://tatyana-fashion.ru/img/products/4bcdb9752d0fe56766ed2898356966b5.jpg',
                                     zoomWidth: 400, zoomHeight: 400
                                " title="<?php echo $product['title'];?>"
                            />

                        </div>
<?php if (true):?>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class = 'cloudzoom-gallery pointer'
                                         src = "/web/images/product-details/similar1.jpg"
                                         data-cloudzoom = "
                                             useZoom: '.cloudzoom',
                                             image: '/web/images/products/product1.jpg',
                                             zoomImage: '/web/images/products/product1.jpg' "
                                    />
                                    <img class = 'cloudzoom-gallery pointer' src = "/web/images/product-details/similar2.jpg"
                                         data-cloudzoom = "useZoom: '.cloudzoom', image: '/web/images/products/product2.jpg', zoomImage: '/web/images/products/product2.jpg' " >
                                    <img class = 'cloudzoom-gallery pointer' src = "/web/images/product-details/similar3.jpg"
                                         data-cloudzoom = "useZoom: '.cloudzoom', image: '/web/images/products/product3.jpg', zoomImage: '/web/images/products/product3.jpg' " >
                                </div>
                                <div class="item">
                                    <img class = 'cloudzoom-gallery pointer'
                                         src = "/web/images/product-details/similar1.jpg"
                                         data-cloudzoom = "
                                             useZoom: '.cloudzoom',
                                             image: '/web/images/products/product1.jpg',
                                             zoomImage: '/web/images/products/product1.jpg' "
                                    />
                                    <img class = 'cloudzoom-gallery pointer' src = "/web/images/product-details/similar2.jpg"
                                         data-cloudzoom = "useZoom: '.cloudzoom', image: '/web/images/products/product2.jpg', zoomImage: '/web/images/products/product2.jpg' " >
                                    <img class = 'cloudzoom-gallery pointer' src = "/web/images/product-details/similar3.jpg"
                                         data-cloudzoom = "useZoom: '.cloudzoom', image: '/web/images/products/product3.jpg', zoomImage: '/web/images/products/product3.jpg' " >
                                </div>

                            </div>
    <?php if (true): ?>
                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
    <?php endif;?>
                        </div>
<?php endif;?>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
<?php if ($product['is_new'] == 1):?>
                            <?php echo Html::img('@web/images/product-details/new.jpg', [
                                                    'class' => "newarrival",
                                                    'alt' => "is new"
                                                 ]);
                            ?>
<?php endif;?>
<?php if ($product['discount'] == 1):?>
                            <?php echo Html::img('@web/images/product-details/8.png', [
                                'class' => "newarrival",
                                'alt' => "discount",
                                'style' => 'height: 60px;'
                            ]);
                            ?>
<?php endif;?>
                            <h2><?php echo $product['title'];?></h2>
                            <p>Артикуль: <?php echo $product['vendor_code']; ?></p>
                            <div id="jRateRead"  data-average="<?php echo $this->context->raiting; ?>"></div>

                            <span>
                                <span>&#8381; <?php echo $product['price'];?></span>
                                <label>Кол-во:</label>
                                <input id="qty_prod" type="text" value="1" />
                                <a data-id="<?php echo $product['id'];?>" href="<?php echo Url::to(['cart/add', 'id' => $product['id']]);?>" class="btn btn-fefault cart qty_prod">
                                    <i class="fa fa-shopping-cart"></i>
                                    В корзину
                                </a>
                            </span>
                            <p><b>Наличие:</b><?php echo ($product['in_stock'] == 1)
                                                            ? ' &nbsp;<span style="color: green;" class="glyphicon glyphicon-ok"></span>
                                                                <span style="color: green;">Есть в наличии </span>'
                                                            : '&nbsp; <span style="color: red;" class="glyphicon glyphicon-ban-circle"></span>
                                                                <span style="color: red;">Нет в наличии</span>';?>
                            </p>
                            <?php if ($product['is_new'] == 1):?>
                            <p><b>Состояние:</b>
                                &nbsp;<span style="color: red" class="glyphicon glyphicon-exclamation-sign"></span>
                               <span style="color: red">Новинка!</span>
                            </p>
                            <?php endif;?>
                            <p><b>Категория:</b>
                                <a href="/category/<?php echo $product['categories']['alias'];?>">
                                    &nbsp;<span class="glyphicon glyphicon-hand-right"></span>
                                    <span><?php echo $product['categories']['title'];?></span>
                                </a>
                            </p>
                            <div>
                                <p><b><span>Описание:</span>&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span></b></p>
                                <?php echo $product['body'];?>
                            </div>
<?php if (!$raiting):?>
                            <p id="noRes"><b><span style="color: red">Оцените данную модель:</span> <span class="glyphicon glyphicon-thumbs-up btn-lg"></span></b></p>
                            <div id="res"></div>
                            <div id="jRate" data-id="<?php echo $product['id'];?>" data-ip="<?php echo $ip;?>">
                                <div id="demo-onchange-value"></div>
                            </div>
<?php endif; ?>

                                <a id="scrollDown" class="btn btn-warning" style="color: white" href="#bottom">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    Оставить комментарий / Задать вопрос
                                </a>

                            <h4>Поделиться:</h4>
                            <div    class="ya-share2"
                                    data-services="odnoklassniki,vkontakte,moimir,facebook"
                                    data-counter="" data-copy="first"

                                    data-title="<?php echo $product['data_title']; ?>"
                                    data-title:vkontakte ="<?php echo $product['data_title']; ?>"
                                    data-title:facebook ="<?php echo $product['data_title']; ?>"
                                    data-title:odnoklassniki ="<?php echo $product['data_title']; ?>"
                                    data-title:moimir ="<?php echo $product['data_title']; ?>"
                                    data-title:gplus ="<?php echo $product['data_title']; ?>"

                                    data-description="<?php echo $product['data_description']; ?>"
                                    data-description:vkontakte="<?php echo $product['data_description']; ?>"
                                    data-description:facebook="<?php echo $product['data_description']; ?>"
                                    data-description:odnoklassniki="<?= $product['data_description']; ?>"
                                    data-description:moimir="<?php echo $product['data_description']; ?>"
                                    data-description:gplus="<?php echo $product['data_description']; ?>"

                                    data-image="<?php echo $product['img']; ?>"
                                    data-imagev:kontakte="<?php echo $product['img']; ?>"
                                    data-image:facebook="<?php echo $product['img']; ?>"
                                    data-image:odnoklassniki="<?php echo $product['img']; ?>"
                                    data-image:moimir="<?php echo $product['img']; ?>"
                                    data-image:gplus="<?php echo $product['img']; ?>" >

                                <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                                <script src="https://yastatic.net/share2/share.js" ></script>
                                <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"
                                        charset="utf-8"></script>
                                <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                            </div>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                <?php echo ProductPlusWidget::widget();?>
                <p><a name="bottom"></a></p>
            </div>
            <div id="hypercomments_widget"></div>
            <script type="text/javascript">
                _hcwp = window._hcwp || [];
                _hcwp.push({widget:"Stream", widget_id: 78300});
                (function() {
                    if("HC_LOAD_INIT" in window)return;
                    HC_LOAD_INIT = true;
                    var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
                    var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
                    hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/78300/"+lang+"/widget.js";
                    var s = document.getElementsByTagName("script")[0];
                    s.parentNode.insertBefore(hcc, s.nextSibling);
                })();
            </script>
        </div>
    </div>
</section>
<section id="advertisement">
    <div class="container">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- You in the style Product -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-9419103276015408"
             data-ad-slot="3252860376"
             data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</section>
