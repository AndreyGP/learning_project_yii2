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
<section id="advertisement">
    <div class="container">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Tatyana Fashion Home adapt -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-9419103276015408"
             data-ad-slot="6773233172"
             data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</section>
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
        <?php if (!empty($products)): ?>
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center"><?php echo $cat_id['title']; ?></h2>
                <?php $i = 0; foreach ($products as $model): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?php $img = $model->getImage() ;?>
                                            <a href="<?php echo Url::to('/product/' . $model['id']); ?>" class="prod_cart">
                                                <?php echo Html::img($img->getUrl('270x'), ['alt' => $model['title']]);?>
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
            <?php echo ProductPlusWidget::widget();?>
                <?php else:?>
                    <center><table cellspacing="5" cellpadding="3" width="400">
                        <tbody>
                        <tr>
                            <td id="tableprops" valign="top" align="left"><img height="33" src="http://ucozua.ru/Scripts/13/9ac78731d2dc.bmp" width="25"></td>
                            <td id="tableprops2" valign="middle" align="left" width="360">
                                <h1 id="textSection1" style="FONT: 13pt/15pt verdana; COLOR: black"><span id="errorText">Кончился Интернет, всё приехали...</span></h1></td></tr>
                        <tr>
                            <td id="tablepropsWidth1" width="400" colspan="2"><font style="FONT: 8pt/11pt verdana; COLOR: black">Поздравляем! Админы нажрались и выключили электричество!. Больше не будет ссылок, прикольных картинок,
                                    свежих анекдотов и порнографии.</font></td></tr>
                        <tr>
                            <td id="tablepropsWidth" width="400" colspan="2"><font id="liD1" style="FONT: 8pt/11pt verdana; COLOR: black">
                                    <hr color="#c0c0c0" noshade="">

                                    <p id="liD2">Попробуйте следующее:
                                    </p><ul>
                                        <li id="instructionsText1">Включите телевизор и посмотрите мультфильмы,
                                            какой-нибудь боевик, детектив, телесериал или просто новости. <br>
                                        </li><li id="instructionsText2">Бахните пивка, а лучше водки и закусите огурцом, чтобы залить печаль :)<br>
                                        </li><li id="instructionsText3">Выключите свой компьютер нафиг и ложитесь
                                            спать.
                                        </li><li id="list4">Если это разрешено действующим Законодательством вашей
                                            страны, последовательно отсоедините от системного блока компьютера шнуры
                                            питания, модема, затем - шнуры видеокарты и принтера, после чего
                                            выбросьте системный блок и монитор компьютера в окно. </li></ul>


                                    <br><br></p>
                                    <hr color="#c0c0c0" noshade="">



                                    <br><br></p>
                                    <h2 id="IEText" style="FONT: 8pt/11pt verdana; COLOR: black">Ошибка
                                        Microsoft Internet Explorer номер 404 - Интернет закончился к чертям
                                        собачьим. <br></h2></font></td></tr></tbody></table></center>
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
