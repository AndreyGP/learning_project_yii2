<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
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
<?php if (!empty($recommended)): ?>
    <div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Рекомендованные товары</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php $count = count($recommended); $i = 0; foreach ($recommended as $item):?>
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
                                    <?php echo Html::img($item['img_zoom'], ['alt' => 'recommend']);?>
                                    <h2><?php echo $item['price'];?></h2>
                                    <p><a class="prod_cart" href="/product/<?php echo $item['id'];?>"><?php echo $item['title'];?></a></p>
                                    <a href="<?php Url::to(['/cart/add', 'id' => $item['id']]);?>" data-id="<?php echo $item['id'];?>" type="button" class="btn btn-default add-to-cart">
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