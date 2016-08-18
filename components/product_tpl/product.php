<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<?php if (!empty($hits)): ?>
    <div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Популярные товары</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php $counth = count($hits); $i = 0; foreach ($hits as $hit):?>
            <?php if ($i == 0):?>
            <div class="item active">
                <?php endif; ?>
                <?php if ($i % 3 == 0 && $i != 0):?>
                <div class="item">
                    <?php endif; ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?php $img = $hit->getImage(); ?>
                                    <a class="prod_cart" href="/product/<?php echo $hit['id'];?>">
                                    <?php echo Html::img($img->getUrl('270x'), ['alt' => 'recommend']);?>
                                    </a>
                                    <h2><?php echo $hit['price'];?></h2>
                                    <p><a class="prod_cart" href="/product/<?php echo $hit['id'];?>"><?php echo $hit['title'];?></a></p>
                                    <a href="<?php Url::to(['/cart/add', 'id' => $hit['id']]);?>" data-id="<?php echo $hit['id'];?>" type="button" class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        В корзину
                                    </a>
                                </div>
                                <?php if ($hit['is_new'] == 1):?>
                                    <img class="new" alt="" src="/web/images/home/new.png">
                                <?php endif;?>
                                <?php if ($hit['discount'] == 1):?>
                                    <img class="new" alt="" src="/web/images/home/sale.png">
                                <?php endif;?>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="<?php echo Url::to(['like/add', 'id' => $hit['id']]);?> " class="add-to-like" data-id="<?php echo $hit['id'];?>"><i class="fa fa-plus-square"></i>В избранное</a></li>
                                    <!--li><a href="#"><i class="fa fa-plus-square"></i>К сравнению</a></li-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php $i++ ;?>
                    <?php if ($i % 3 == 0 && $i != 0 || $i == $counth):?>
                </div>
            <?php endif; ?>
                <?php  endforeach;?>
            </div>
<?php if ($counth > 3): ?>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
<?php endif; ?>
        </div>
    </div><!--/recommended_items-->
<?php endif; ?>
<?php if (!empty($recommended)): ?>
    <div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Рекомендованные товары</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php $countr = count($recommended); $i = 0; foreach ($recommended as $item):?>
            <?php if ($i == 0):?>
            <div class="item active">
                <?php endif; ?>
                <?php if ($i % 3 == 0 && $i != 0):?>
                <div class="item">
                    <?php endif; ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?php $imgi = $item->getImage(); ?>
                                    <a class="prod_cart" href="/product/<?php echo $item['id'];?>">
                                    <?php echo Html::img($imgi->getUrl('270x'), ['alt' => 'recommend']);?>
                                    </a>
                                    <h2><?php echo $item['price'];?></h2>
                                    <p><a class="prod_cart" href="/product/<?php echo $item['id'];?>"><?php echo $item['title'];?></a></p>
                                    <a href="<?php Url::to(['/cart/add', 'id' => $item['id']]);?>" data-id="<?php echo $item['id'];?>" type="button" class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        В корзину
                                    </a>
                                </div>
                                <?php if ($item['is_new'] == 1):?>
                                    <img class="new" alt="" src="/web/images/home/new.png">
                                <?php endif;?>
                                <?php if ($item['discount'] == 1):?>
                                    <img class="new" alt="" src="/web/images/home/sale.png">
                                <?php endif;?>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="<?php echo Url::to(['like/add', 'id' => $item['id']]);?> " class="add-to-like" data-id="<?php echo $item['id'];?>"><i class="fa fa-plus-square"></i>В избранное</a></li>
                                    <!--li><a href="#"><i class="fa fa-plus-square"></i>К сравнению</a></li-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php $i++ ;?>
                    <?php if ($i % 3 == 0 && $i != 0 || $i == $countr):?>
                </div>
            <?php endif; ?>
                <?php  endforeach;?>
            </div>
    <?php if ($countr > 3): ?>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
    <?php endif;?>
        </div>
    </div><!--/recommended_items-->
<?php endif; ?>