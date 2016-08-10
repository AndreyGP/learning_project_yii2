<?php
use app\components\MenuCategoryWidget;
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
                    </ul>

                    <div class="brands_products"><!--brands_products-->
                        <h2>Бренды</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
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
                            <img class = "cloudzoom img_400" src = "<?php echo $product['img_zoom'];?>"
                                 data-cloudzoom = "zoomImage: '<?php echo $product['img_zoom'];?>'" />

                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href='/web/images/products/product1.jpg' class='cloud-zoom-gallery'
                                       rel="useZoom: 'zoom1', smallImage: '/web/images/products/product3.jpg', title:'описание 1' ">
                                        <img src="/web/images/product-details/similar1.jpg" alt="описание 1"/></a>

                                    <a href='/web/images/products/product3.jpg' class='cloud-zoom-gallery'
                                       rel="useZoom: 'zoom1', smallImage: ' /web/images/products/product3.jpg', title:'описание 2' ">
                                        <img src="/web/images/product-details/similar2.jpg" alt="описание 2"/></a>

                                    <a href='/web/images/products/product5.jpg' class='cloud-zoom-gallery'
                                       rel="useZoom: 'zoom1', smallImage: '/web/images/products/product3.jpg', title:'описание 3' ">
                                        <img src="/web/images/product-details/similar3.jpg" alt="описание 3"/></a>
                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

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
    <?php echo Html::img('@web/images/product-details/new.jpg', [
        'class' => "newarrival",
        'alt' => "discount"
    ]);
    ?>
<?php endif;?>
                            <h2><?php echo $product['title'];?></h2>
                            <p>Артикуль: <?php echo $product['vendor_code']; ?></p>
                            <img src="/web/images/product-details/rating.png" alt="" />
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
                                                            ? ' <span style="color: green;">Есть в наличии</span>'
                                                            : ' <span style="color: red;">Нет в наличии</span>';?>
                            </p>
                            <?php if ($product['is_new'] == 1):?>
                            <p><b>Состояние:</b> <span style="color: red">Новинка!</span></p>
                            <?php endif;?>
                            <p><b>Категория:</b>
                                <a href="/category/<?php echo $product['categories']['alias'];?>">
                                    <span><?php echo $product['categories']['title'];?></span>
                                </a>
                            </p>
                            <div>
                                <p><b><span>Описание:</span></b></p>
                                <?php echo $product['body'];?>
                            </div>
                            <span><h4>Поделиться:</h4></span>
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
<?php if (!empty($hits)): ?>
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Популярные товары</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
<?php $count = count($hits); $i = 0; foreach ($hits as $hit):?>
<?php if ($i == 0):?>
                            <div class="item active">
<?php endif; ?>
<?php if ($i % 3 == 0 && $i != 0):?>
                            <div class="item">
<?php endif; ?>
<?php if ($hit['id'] == $product['id']): ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper" style=" border: none;">
                                        <div class="single-products">
                                            <div class="productinfo text-center" style="max-height: 385px;">
                                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                                <!-- Product recommend -->
                                                <ins class="adsbygoogle"
                                                     style="display:block"
                                                     data-ad-client="ca-pub-9419103276015408"
                                                     data-ad-slot="7785634779"
                                                     data-ad-format="auto"></ins>
                                                <script>
                                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
       <?php $i++;?>
<?php continue; endif;?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?php echo Html::img($hit['img_zoom'], ['alt' => 'recommend']);?>
                                                <h2><?php echo $hit['price'];?></h2>
                                                <p><a class="prod_cart" href="/product/<?php echo $hit['id'];?>"><?php echo $hit['title'];?></a></p>
                                                <a href="<?php Url::to(['/cart/add', 'id' => $hit['id']]);?>" data-id="<?php echo $hit['id'];?>" type="button" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    В корзину
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php $i++ ;?>
<?php if ($i % 3 == 0 && $i != 0 || $i == $count):?>
                            </div>
<?php endif; ?>
<?php  endforeach;?>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->
<?php endif; ?>
<?php if (!empty($recomend)): ?>
            <div class="recommended_items"><!--recommended_items-->
                <h2 class="title text-center">Рекомендованные товары</h2>

                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
<?php $count = count($recomend); $i = 0; foreach ($recomend as $hit):?>
<?php if ($i == 0):?>
                        <div class="item active">
<?php endif; ?>
<?php if ($i % 3 == 0 && $i != 0):?>
                            <div class="item">
<?php endif; ?>
<?php if ($hit['id'] == $product['id']): ?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper" style=" border: none;">
                                            <div class="single-products">
                                                <div class="productinfo text-center" style="max-height: 385px;">
                                                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                                    <!-- Product recommend -->
                                                    <ins class="adsbygoogle"
                                                         style="display:block"
                                                         data-ad-client="ca-pub-9419103276015408"
                                                         data-ad-slot="7785634779"
                                                         data-ad-format="auto"></ins>
                                                    <script>
                                                        (adsbygoogle = window.adsbygoogle || []).push({});
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php $i++;?>
<?php continue; endif;?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?php echo Html::img($hit['img_zoom'], ['alt' => 'recommend']);?>
                                                <h2><?php echo $hit['price'];?></h2>
                                                <p><a class="prod_cart" href="/product/<?php echo $hit['id'];?>"><?php echo $hit['title'];?></a></p>
                                                <a href="<?php Url::to(['/cart/add', 'id' => $hit['id']]);?>" data-id="<?php echo $hit['id'];?>" type="button" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    В корзину
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php $i++ ;?>
<?php if ($i % 3 == 0 && $i != 0 || $i == $count):?>
                            </div>
<?php endif; ?>
<?php  endforeach;?>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->
<?php endif; ?>
            </div>
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
