<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<?php if (!empty($recomend)): ?>
    <h2 class="title text-center">Рекомендуемые товары</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php $count = count($recomend); $i = 0; foreach ($recomend as $rcmd):?>
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
                                <a href="<?php echo Url::to('/product/' . $rcmd['id']); ?>" class="prod_cart">
                                    <?php echo Html::img($rcmd['img_zoom'], ['alt' => 'recommend']);?>
                                </a>
                                <h2><?php echo $rcmd['price'];?></h2>
                                <a href="<?php echo Url::to('/product/' . $rcmd['id']); ?>" class="prod_cart">
                                    <p><?php echo $rcmd['title'];?></p>
                                </a>
                                <a href="<?php Url::to(['/cart/add', 'id' => $rcmd['id']]);?>" data-id="<?php echo $rcmd['id'];?>" type="button" class="btn btn-default add-to-cart">
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
<?php endif; ?>