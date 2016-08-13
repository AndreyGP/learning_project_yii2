<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 13.08.2016
 * Time: 21:18
 */

namespace app\models;


class Like extends AppActiveModel
{
    public function addToLike($product, $qty = 1)
    {
        if (isset($_SESSION['like'][$product['id']])){
            $_SESSION['like'][$product['id']]['QTY'] += $qty;
        } else {
            $_SESSION['like'][$product['id']] = [
                'QTY' => $qty,
                'NAME' => $product['title'],
                'PRICE' => $product['price'],
                'IMG' => $product['img_zoom'],
                'CODE' => $product['vendor_code'],
                'ID' => $product['id']
            ];
        }
        $_SESSION['like.qty'] = $qty;
        $_SESSION['like.sum'] = $_SESSION['like'][$product['id']]['PRICE'] * $qty;
        $_SESSION['like.prc'] = ($_SESSION['like.qty'] <= 10)
            ? $_SESSION['like.qty'] * 2
            : 20;
    }

    public function deleteFromLIke($id)
    {
        if ( !isset($_SESSION['like'][$id]) ){
            return false;
        }
        $_SESSION['like.qty'] = $_SESSION['like.qty'] - $_SESSION['like'][$id]['QTY'];
        $_SESSION['like.sum'] = $_SESSION['like.sum'] - ($_SESSION['like'][$id]['PRICE'] * $_SESSION['like'][$id]['QTY']);
        unset($_SESSION['like'][$id]);
        $_SESSION['like.prc'] = ($_SESSION['like.qty'] <= 10)
            ? $_SESSION['like.qty'] * 2
            : 20;
    }
}