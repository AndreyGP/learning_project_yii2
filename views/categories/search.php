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
                <?php if (!empty($products)): ?>
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Результаты поиска : <?php echo Html::encode($q); ?></h2>
                        <?php $i = 0; foreach ($products as $model): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="<?php echo Url::to('/product/' . $model['id']); ?>" class="prod_cart">
                                                <?php echo Html::img($model['img_zoom'], ['alt' => $model['title']]);?>
                                            </a>
                                            <h2><?php echo $model['price'];?></h2>
                                            <p>
                                                <a href="<?php echo Url::to('/product/' . $model['id']); ?>" class="prod_cart">
                                                    <?php echo $model['title'];?>
                                                </a>
                                            </p>
                                            <a data-id="<?php echo $model['id'];?>" href="<?php echo Url::to(['cart/add', 'id' => $model['id']]);?>" class="btn btn-default add-to-cart">
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
                                            <li><a href="#"><i class="fa fa-plus-square"></i>В избранное</a></li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i>К сравнению</a></li>
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
                <?php else:?>
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Результаты поиска : <?php echo Html::encode($q); ?></h2>
                        <center>
                            <h2>Поиск не дал результатов...</h2>
                            <?php echo Html::img('@web/images/netu.jpg', ['alt' => "Ку...", 'width' => '350']);?>
                        </center>
                    </div>
                </div>
                <?php endif;?>

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
