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
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function addToLike($product, $qty = 1)
    {
        $mainImg = $product->getImage();
        if (isset($_SESSION['like'][$product['id']])){
            $_SESSION['like'][$product['id']]['QTY'] += $qty;
        } else {
            $_SESSION['like'][$product['id']] = [
                'QTY' => $qty,
                'NAME' => $product['title'],
                'PRICE' => $product['price'],
                'IMG' => $mainImg->getUrl('x70'),
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