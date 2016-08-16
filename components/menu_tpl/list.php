<option value="<?= $category['id'];?>" <?= ($this->id == $category['id']) ? 'disabled' : false ?>
    <?= (isset($this->model->parent_id) && $category['id'] == $this->model->parent_id) ? 'selected' : '' ?>
    <?= (isset($this->model->category_id) && $category['id'] == $this->model->category_id) ? 'selected' : '' ?>>
        <?= $tab . $category['title'];?>
</option>
<?php if ($category['children']):?>
        <?= $this->menuHtml($category['children'], $tab = '&emsp;&emsp;' . $tab . '&#10149;', $this->id);?>
<?php endif;?>
