<h1>Благодарим за Ваш заказ!</h1>
<h3>Уважаемый(ая) <?= $order->name ?></h3>
<div class="table-responsive">
    <table style="width: 100%; border: 1px solid #DDDDDD; border-collapse: collapse;">
        <thead>
        <tr style="background: #f9f9f9;">
            <td style="padding: 8px; border: 1px solid #DDDDDD;">Наименование</td>
            <td style="padding: 8px; border: 1px solid #DDDDDD;">Цена</td>
            <td style="padding: 8px; border: 1px solid #DDDDDD;">Кол-во</td>
            <td style="padding: 8px; border: 1px solid #DDDDDD;">Всего</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($session['cart'] as $id => $item):?>
            <tr>
                <td style="padding: 8px; border: 1px solid #DDDDDD;">
                    <h4><?php echo $item['NAME'];?></h4>
                </td>
                <td style="padding: 8px; border: 1px solid #DDDDDD;">
                    <p><?php echo $item['PRICE'];?></p>
                </td>
                <td style="padding: 8px; border: 1px solid #DDDDDD;">
                    <?php echo $item['QTY'];?>
                </td>
                <td style="padding: 8px; border: 1px solid #DDDDDD;">
                    <p class="cart_total_price"><?php echo $item['QTY'] * $item['PRICE'];?></p>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td style="padding: 8px; border: 1px solid #DDDDDD;">&nbsp;</td>
            <td style="padding: 8px; border: 1px solid #DDDDDD;">&nbsp;</td>
            <td style="padding: 8px; border: 1px solid #DDDDDD;">&nbsp;</td>
            <td style="padding: 8px; border: 1px solid #DDDDDD;">
                <table class="table table-condensed total-result">
                    <tr style="padding: 8px; border: 1px solid #DDDDDD;">
                        <td >Всего вещей: </td>
                        <td ><?php echo $session['cart.qty'];?></td>
                    </tr>
                    <tr style="padding: 8px; border: 1px solid #DDDDDD;">
                        <td > На сумму: </td>
                        <td ><?php echo $session['cart.sum'];?></td>
                    </tr>
                    <tr style="padding: 8px; border: 1px solid #DDDDDD;">
                        <td >Скидка: </td>
                        <td ><?php echo $session['cart.prc'] . '%';?></td>
                    </tr>
                    <tr style="padding: 8px; border: 1px solid #DDDDDD;">
                        <td >К оплате: </td>
                        <td ><?php echo ($session['cart.sum'] / 100) * (100 - $session['cart.prc']);?></td>
                    </tr>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>