<?php
use app\components\MenuCategoryWidget;
use app\components\BrandMenuWidget;
use app\components\RecommendedWidget;
use app\components\SaleWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
//debug($hits);

?>

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>T</span>atyana <span>F</span>ashion</h1>
                                <h2>Модная одежда для Вас</h2>
                                <p>Будьте всегда и раньше всех в стиле!<br/> Приобретая у нас одежду, Вы можете быть уверены, что в Вы окажитесь одной из, если не самой стильной </p>
                                <a href="/category" class="btn btn-default get">Начни сейчас</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="/web/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                <!--img src="/home/pricing.png"  class="pricing" alt="" /-->
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>T</span>atyana <span>F</span>ashion</h1>
                                <h2>Модная одежда для Вас</h2>
                                <p>Экономьте всегда и вместе с нами!<br/> Наши постоянная и акционная системы скидок Вас приятно удивят. Получите акционную скидку к основной уже после заказа</p>
                                <a href="/category" class="btn btn-default get">Начни сейчас</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="/web/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                <!--img src="/home/pricing.png"  class="pricing" alt="" /-->
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>T</span>atyana <span>F</span>ashion</h1>
                                <h2>Модная одежда для Вас</h2>
                                <p>Будьте с нами на шаг впереди и в моде!<br/> Наш ассортимент постоянно обновляется за счёт моделей, которые пока не появились в России и СНГ.  </p>
                                <a href="/category" class="btn btn-default get">Начни сейчас</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="/web/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <!--img src="home/pricing.png" class="pricing" alt="" /-->
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

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
<?php if (!empty($hits)): ?>
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Популярные товары</h2>
    <?php $i = 0; foreach ($hits as $model): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?php $img = $model->getImage();?>
                                    <a href="<?php echo Url::to('/product/' . $model['id']); ?>" class="prod_cart">
                                    <?php echo Html::img($img->getUrl('270x'), ['alt' => $model['title']]);?>
                                    </a>
                                    <h2><?php echo $model['price'];?></h2>
                                    <p>
                                        <a href="<?php echo Url::to('/product/' . $model['id']); ?>" class="prod_cart">
                                            <?php echo $model['title'];?>
                                        </a>
                                    </p>
                                    <a href="<?php echo Url::to(['cart/add', 'id' => $model['id']]);?>" class="btn btn-default add-to-cart" data-id="<?php echo $model['id'];?>">
                                        <i class="fa fa-shopping-cart"></i>
                                        В корзину
                                    </a>
                                </div>
                                <!--div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2><?php //echo $model['price'];?></h2>
                                        <p><?php //echo $model['title'];?></p>
                                        <a href="#" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            В корзину
                                        </a>
                                    </div>
                                </div-->
                            <?php if ($model['is_new'] == 1):?>
                                <img class="new" alt="" src="/web/images/home/new.png">
                            <?php endif;?>
                            <?php if ($model['discount'] == 1):?>
                                <img class="new" alt="" src="/web/images/home/sale.png">
                            <?php endif;?>


                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="<?php echo Url::to(['like/add', 'id' => $model['id']]);?> " class="add-to-like" data-id="<?php echo $model['id'];?>"><i class="fa fa-plus-square"></i>В избранное</a></li>
                                    <!--li><a href="#"><i class="fa fa-plus-square"></i>К сравнению</a></li-->
                                </ul>
                            </div>
                        </div>
                    </div>
        <?php $i++;?>
        <?php if ($i % 3 == 0):;?>
            <div class="clearfix"></div>
        <?php endif;?>
    <?php endforeach;?>
                </div><!--features_items-->
    <div class="clearfix"></div>
    <?php echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>
<?php endif;?>
                <div class="recommended_items"><!--recommended_items-->
                    <?php echo RecommendedWidget::widget();?>
                </div><!--/recommended_items-->

                <div class="category-tab"><!--category-tab-->
                    <?php echo SaleWidget::widget();?>
                </div><!--/category-tab-->

            </div>
        </div>
    </div>
</section>
<section id="advertisement">
    <div class="container">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- You in the style Category -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-9419103276015408"
             data-ad-slot="4899547174"
             data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</section>
