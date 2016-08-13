<div class="table-responsive cart_info">
    <?php if (!empty($session['like'])):?>
        <table class="table table-condensed table-hover table-striped">
            <thead>
            <tr class="cart_menu">
                <td class="image">Товар</td>
                <td class="description"></td>
                <td class="price">Цена</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($session['like'] as $id => $item):?>
                <tr>
                    <td class="cart_product">
                        <a href="/product/<?php echo $id;?>"><img height="50" src="<?php echo $item['IMG'];?>" alt="<?php echo $item['NAME'];?>"></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="/product/<?php echo $id;?>"><?php echo $item['NAME'];?></a></h4>
                        <p><?php echo $item['CODE'];?></p>
                    </td>
                    <td class="cart_price">
                        <p><?php echo $item['PRICE'];?></p>
                    </td>
                    <td class="cart_delete">
                        <a data-id="<?php echo $item['ID'];?>" class="cart_quantity_delete del-item" href=""><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <center>
            <h2>Ничего не осталось в избранном...</h2>
            <img src="/web/images/netu.jpg" alt="Ку..." width="350">

        </center>
    <?php endif;?>
</div>