<?php
use yii\helpers\Url;
?>
<?php if(!empty($brands)):?>
<h2>Бренды</h2>
<div class="brands-name">
    <ul class="nav nav-pills nav-stacked">
<?php foreach ($brands as $brand):?>
        <li>
            <a href="<?= Url::to('/brand/' . $brand['title']);?>">
                <span class="pull-right"><?php echo $brand['count'];?></span>
                <?php echo mb_strtoupper($brand['title']);?>
            </a>
        </li>
<?php endforeach;?>
    </ul>
</div>
<?php endif;?>