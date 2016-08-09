<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 08.08.2016
 * Time: 0:05
 */

namespace app\models;
use app\models\AppActiveModel;

class Cart extends AppActiveModel
{
    public function addToCart($product, $qty = 1)
    {
        if (isset($_SESSION['cart'][$product['id']])){
            $_SESSION['cart'][$product['id']]['QTY'] += $qty;
        } else {
            $_SESSION['cart'][$product['id']] = [
                'QTY' => $qty,
                'NAME' => $product['title'],
                'PRICE' => $product['price'],
                'IMG' => $product['img_zoom'],
                'CODE' => $product['vendor_code'],
                'ID' => $product['id']
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty'])
            ? $_SESSION['cart.qty'] + $qty
            : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum'])
            ? $_SESSION['cart.sum'] + $_SESSION['cart'][$product['id']]['PRICE'] * $qty
            : $_SESSION['cart'][$product['id']]['PRICE'] * $qty;
    }

    public function deleteFromCart($id)
    {
        if ( !isset($_SESSION['cart'][$id]) ){
            return false;
        }
        $_SESSION['cart.qty'] = $_SESSION['cart.qty'] - $_SESSION['cart'][$id]['QTY'];
        $_SESSION['cart.sum'] = $_SESSION['cart.sum'] - ($_SESSION['cart'][$id]['PRICE'] * $_SESSION['cart'][$id]['QTY']);

        unset($_SESSION['cart'][$id]);
    }

    public function recalculationCart($id, $action)
    {
        if ( !isset($_SESSION['cart'][$id]) ){
            return false;
        }
        if ($action == 'down'){
            $_SESSION['cart'][$id]['QTY'] = $_SESSION['cart'][$id]['QTY'] - 1;
            $_SESSION['cart.qty'] = $_SESSION['cart.qty'] - 1;
            $_SESSION['cart.sum'] = $_SESSION['cart.sum'] - $_SESSION['cart'][$id]['PRICE'];
        }
        if ($action == 'up'){
            $_SESSION['cart'][$id]['QTY'] = $_SESSION['cart'][$id]['QTY'] + 1;
            $_SESSION['cart.qty'] = $_SESSION['cart.qty'] + 1;
            $_SESSION['cart.sum'] = $_SESSION['cart.sum'] + $_SESSION['cart'][$id]['PRICE'];
        }
    }
}