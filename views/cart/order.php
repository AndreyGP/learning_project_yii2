<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<section id="cart_items">
    <div class="container">
<?php if (Yii::$app->session->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::$app->session->getFlash('success');?>
    </div>
<?php endif;?>
<?php if (Yii::$app->session->hasFlash('error')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::$app->session->getFlash('error');?>
    </div>
<?php endif;?>
        <div class="table-responsive cart_info">
<?php if (!empty($session['cart'])):?>
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Товар</td>
                    <td class="description"></td>
                    <td class="price">Цена</td>
                    <td class="quantity">Количество</td>
                    <td class="total">Всего</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($session['cart'] as $id => $item):?>
                    <tr>
                        <td class="cart_product">
                            <a href="/product/<?php echo $id;?>"><img height="50" src="<?php echo $item['IMG'];?>" alt="<?php echo $item['NAME'];?>"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="/product/<?php echo $id;?>"><?php echo $item['NAME'];?></a></h4>
                            <p>Артикуль: <?php echo $item['CODE'];?></p>
                        </td>
                        <td class="cart_price">
                            <p><?php echo $item['PRICE'];?></p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up cart_up" href="<?php echo Url::to(['cart/recalc', 'id' => $item['ID'], 'action' => 'up']);?>" data-id="<?php echo $item['ID'];?>"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $item['QTY'];?>" autocomplete="on" size="1">
                                <a class="cart_quantity_down cart_down" href="<?php echo Url::to(['cart/recalc', 'id' => $item['ID'], 'action' => 'down']);?>" data-id="<?php echo $item['ID'];?>"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"><?php echo $item['QTY'] * $item['PRICE'];?></p>
                        </td>
                        <td class="cart_delete">
                            <a data-id="<?php echo $item['ID'];?>" class="cart_quantity_delete cart-del del-item" href="<?php echo Url::to(['cart/delete', 'id' => $item['ID']]);?>"><i class="fa fa-times"></i></a>
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
        </div>
    </div>
</section> <!--/#cart_items-->
<hr />
<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>Введите ваши контактные данные:</h3>
                <?php $form = ActiveForm::begin();?>
                <?php
                echo $form->field($order, 'name');
                echo $form->field($order, 'email');
                echo $form->field($order, 'phone');
                echo $form->field($order, 'address');
                echo Html::submitButton('Оформить заказ', ['class' => 'btn btn-success']);
                ?>
                <?php ActiveForm::end();?>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
<?php else: ?>
    <center>
        <h2>Корзина пуста...</h2>
        <img src="/web/images/netu.jpg" alt="Ку..." width="350">
        <section id="advertisement">
            <div class="container">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- You in the style Category -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9419103276015408"
                     data-ad-slot="4899547174"
                     data-ad-format="auto"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </section>
    </center>
<?php endif;?>