<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 13.08.2016
 * Time: 16:59
 */

namespace app\components;
use yii\base\Widget;
use app\models\Product;
use app\models\Brand;
use Yii;

class SaleWidget extends Widget
{
    public $tpl;
    public $html;

    public function init()
    {
        parent::init();

        $this->tpl .= 'sale.php';
    }

    public function run()
    {
        $sale = Yii::$app->cache->get('sale');
        if (empty($sale)){
            $brands = Brand::find()
                ->asArray()
                ->select(['id', 'title'])
                ->indexBy('id')
                ->all();

            $discount = Product::find()
                ->asArray()
                ->where(['discount' => 1])
                ->select(['id', 'brand_id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
                ->orderBy('brand_id')
                ->all();
            $this->html = $this->saleHtml($brands, $discount);
            Yii::$app->cache->set('sale', $this->html, 604800);
        } else {
            $this->html = $sale;
        }
        return $this->html;
    }

    protected function saleHtml($brands, $discount)
    {
        ob_start();
        include __DIR__ . '/sale_tpl/'  . $this->tpl;
        return ob_get_clean();
    }
}