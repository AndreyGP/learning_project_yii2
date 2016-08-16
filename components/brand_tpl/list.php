<?php foreach ($brands as $brand):?>
<option value="<?= $brand['id'];?>" <?= ($brand['id'] == $this->model->brand_id) ? 'selected' : '' ?>>
    <?= mb_strtoupper($brand['title']);?>
</option>
    <?php endforeach;?>