<option value="<?= $category['id'];?>" <?= ($this->id == $category['id']) ? 'disabled' : false ?> <?= ($category['id'] == $this->model->parent_id) ? 'selected' : false ?>><?= $tab . $category['title'];?></option>
<?php if ($category['children']):?>
        <?= $this->menuHtml($category['children'], $tab = '&emsp;&emsp;' . $tab . '&#10149;', $id);?>
<?php endif;?>
