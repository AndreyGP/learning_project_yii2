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
                                <?php $img = $rcmd->getImage(); ?>
                                <a href="<?php echo Url::to('/product/' . $rcmd['id']); ?>" class="prod_cart">
                                    <?php echo Html::img($img->getUrl('270x'), ['alt' => 'recommend']);?>
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
                            <?php if ($rcmd['is_new'] == 1):?>
                                <img class="new" alt="" src="/web/images/home/new.png">
                            <?php endif;?>
                            <?php if ($rcmd['discount'] == 1):?>
                                <img class="new" alt="" src="/web/images/home/sale.png">
                            <?php endif;?>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="<?php echo Url::to(['like/add', 'id' => $rcmd['id']]);?> " class="add-to-like" data-id="<?php echo $rcmd['id'];?>"><i class="fa fa-plus-square"></i>В избранное</a></li>
                                <!--li><a href="#"><i class="fa fa-plus-square"></i>К сравнению</a></li-->
                            </ul>
                        </div>
                    </div>
                </div>
                <?php $i++ ;?>
                <?php if ($i % 3 == 0 && $i != 0 || $i == $count):?>
            </div>
        <?php endif; ?>
            <?php  endforeach;?>

        </div>
    <?php if ($count > 3):?>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    <?php endif; ?>
    </div>
<?php endif; ?>