<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 13.08.2016
 * Time: 14:00
 */

namespace app\components;
use yii\base\Widget;
use app\models\Product;
use app\models\Brand;
use Yii;

class BrandMenuWidget extends Widget
{
    public $tpl;
    public $html;

    public function init()
    {
        parent::init();

        $this->tpl .= 'brand.php';
    }

    public function run()
    {
        $menu = Yii::$app->cache->get('brand_menu');
        if (empty($menu)){
            $brands = Brand::find()->asArray()->indexBy('id')->all();
            $brands = $this->brandCount($brands);
            $this->html = $this->brandMenuHtml($brands);
            Yii::$app->cache->set('brand_menu', $this->html, 604800);
        } else {
            $this->html = $menu;
        }
        return $this->html;
    }

    protected function brandCount($brands)
    {
        $brand_count = [];
        foreach ($brands as $item){
            $brand_count[$item['id']] = $item;
            $brand_count[$item['id']]['count'] = Product::find()->select(['brand_id'])->where(['brand_id' => $item['id']])->count();
        }
        return $brand_count;
    }

    protected function brandMenuHtml($brands)
    {
        ob_start();
        include __DIR__ . '/brand_tpl/'  . $this->tpl;
        return ob_get_clean();
    }
}