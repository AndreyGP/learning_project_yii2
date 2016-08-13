<?php
use yii\helpers\Url;
?>
<li>
    <a href="<?= Url::to('/category/' . $category['alias']);?>">
        <?php if ($category['children']):?>
            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
        <?php endif;?>
        <?= $category['title']; ?>
    </a>
    <?php if ($category['children']):?>
        <ul>
        <?= $this->menuHtml($category['children']);?>
        </ul>
    <?php endif;?>
</li>
