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
    public $model;

    public function init()
    {
        parent::init();
        if ($this->tpl === null){
            $this->tpl = 'brand';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        if ($this->tpl == 'brand.php'){
            $menu = Yii::$app->cache->get('brand_menu');
            if (!empty($menu)) return $menu;
        }
        $brands = Brand::find()->asArray()->indexBy('id')->orderBy('title')->all();
        if ($this->tpl == 'brand.php'){
            $brands = $this->brandCount($brands);
        }
        $this->html = $this->brandMenuHtml($brands);
        if ($this->tpl == 'brand.php'){
            Yii::$app->cache->set('brand_menu', $this->html, 604800);
        }

        return $this->html;
    }

    protected function brandCount($brands)
    {
        $brand_count = [];
        foreach ($brands as $item){
            $brand_count[$item['id']] = $item;
            $brand_count[$item['id']]['count'] = Product::find()
                ->select(['brand_id'])
                ->where(['brand_id' => $item['id']])
                ->count();
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