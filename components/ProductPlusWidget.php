<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 13.08.2016
 * Time: 9:15
 */

namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Products;
use yii\web\NotFoundHttpException;
use Yii;

class ProductPlusWidget extends Widget
{
    public $tpl;
    public $hits;
    public $recommended;
    public $html;

    public function init()
    {
        parent::init();

        $this->tpl = 'product.php';
    }

    public function run()
    {
        $product_plus = Yii::$app->cache->get('product_plus');
        if (empty($product_plus)){
            $this->hits = Products::find()
                ->select(['id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
                ->where(['hit' => 1])
                ->orderBy('id DESC')
                ->limit(12)
                ->all();
            $this->recommended = Products::find()
                ->select(['id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
                ->where(['recomended' => 1])
                ->orderBy('id DESC')
                ->limit(12)
                ->all();
            $this->html = $this->productTemplade($this->hits, $this->recommended);
            Yii::$app->cache->set('product_plus', $this->html, 604800);
        } else {
            $this->html = $product_plus;
        }
        //debug($this->html);
        return $this->html;
    }

     protected function productTemplade($hits, $recommended){
        ob_start();
        include __DIR__ . '/product_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}