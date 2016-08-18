
<div class="table-responsive cart_info">
<?php if (!empty($session['cart'])):?>
    <table class="table table-condensed table-hover table-striped">
        <thead>
        <tr class="cart_menu">
            <td class="image">Товар</td>
            <td class="description"></td>
            <td class="price">Цена</td>
            <td class="quantity">Кол-во</td>
            <td class="total">Всего</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
<?php foreach($session['cart'] as $id => $item):?>
        <tr>
            <td class="cart_product">
                <a href="/product/<?php echo $id;?>"><img src="<?php echo $item['IMG'];?>" alt="<?php echo $item['NAME'];?>"></a>
            </td>
            <td class="cart_description">
                <h4><a href="/product/<?php echo $id;?>"><?php echo $item['NAME'];?></a></h4>
                <p><?php echo $item['CODE'];?></p>
            </td>
            <td class="cart_price">
                <p><?php echo $item['PRICE'];?></p>
            </td>
            <td class="cart_quantity">
                <div class="cart_quantity_button">
                    <a class="cart_quantity_up" href="" data-id="<?php echo $item['ID'];?>"> + </a>
                    <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $item['QTY'];?>" autocomplete="on" size="1">
                    <a class="cart_quantity_down" href="" data-id="<?php echo $item['ID'];?>"> - </a>
                </div>
            </td>
            <td class="cart_total">
                <p class="cart_total_price"><?php echo $item['QTY'] * $item['PRICE'];?></p>
            </td>
            <td class="cart_delete">
                <a data-id="<?php echo $item['ID'];?>" class="cart_quantity_delete del-item" href=""><i class="fa fa-times"></i></a>
            </td>
        </tr>
<?php endforeach; ?>
        <tr>
            <td colspan="4">&nbsp;</td>
            <td colspan="2">
                <table class="table table-condensed total-result">
                    <tr>
                        <td>Всего вещей: </td>
                        <td><?php echo $session['cart.qty'];?></td>
                    </tr>
                    <tr>
                        <td>На сумму: </td>
                        <td><?php echo $session['cart.sum'];?></td>
                    </tr>
                    <tr>
                        <td>Скидка: </td>
                        <td><?php echo $session['cart.prc'] . '%';?></td>
                    </tr>
                    <tr>
                        <td>К оплате: </td>
                        <td><span><?php echo ($session['cart.sum'] / 100) * (100 - $session['cart.prc']);?></span></td>
                    </tr>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
<?php else: ?>
    <center>
        <h2>Корзина пуста...</h2>
        <img src="/web/images/netu.jpg" alt="Ку..." width="350">

    </center>
<?php endif;?>
</div>