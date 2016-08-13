<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<?php if (!empty($discount)): ?>
    <h2 class="title text-center">Распродажа</h2>
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <?php $i = 0; foreach($brands as $brand):?>
                <li <?php if ($i == 0) echo 'class="active"'?>>
                    <a href="#<?php echo $brand['id'] ;?>" data-toggle="tab">
                        <?php echo mb_strtoupper($brand['title']) ;?>
                    </a>
                </li>
                <?php $i++; endforeach; ?>
        </ul>
    </div>
    <div class="tab-content">
        <?php $b = 0; foreach($brands as $brand):?>
            <div class="tab-pane fade <?php if ($b == 0) echo 'active'?> in" id="<?php echo $brand['id'] ;?>" >
                <?php $id = $brand['id']; $i = 0; $f = 0; foreach ($discount as $item): ?>
                    <?php if ($item['brand_id'] == $id):?>
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="<?php echo Url::to('/product/' . $item['id']); ?>" class="prod_cart">
                                            <img src="<?php echo $item['img_zoom'] ;?>" alt="<?php echo $item['title'] ;?>" />
                                        </a>
                                        <h2><?php echo $item['price'] ;?></h2>
                                        <a href="<?php echo Url::to('/product/' . $item['id']); ?>" class="prod_cart">
                                            <p><?php echo $item['title'] ;?></p>
                                        </a>
                                        <a href="<?php Url::to(['/cart/add', 'id' => $item['id']]);?>" data-id="<?php echo $item['id'];?>" type="button" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            В корзину
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++;  endif;?>
                    <?php $f++; if ($i == 4 || $f == count($discount)) break 1; endforeach; ?>
            </div>
            <?php $b++; endforeach; ?>
    </div>
<?php endif;?>