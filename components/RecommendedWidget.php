<?php
/**
 * Created by PhpStorm.
 * User: Famaly
 * Date: 13.08.2016
 * Time: 18:57
 */

namespace app\components;
use yii\base\Widget;
use app\models\Product;
use Yii;

class RecommendedWidget extends Widget
{
    public $tpl;
    public $html;

    public function init()
    {
        parent::init();

        $this->tpl .= 'recommended.php';
    }

    public function run()
    {
        $recommended = Yii::$app->cache->get('recommended');
        if (empty($recommended)){
            $recomend = Product::find()
                ->asArray()
                ->select(['id', 'title', 'price', 'img_zoom', 'is_new', 'discount'])
                ->where(['recomended' => 1])
                ->orderBy('id DESC')
                ->limit(12)
                ->all();
            $this->html = $this->recommendedHtml($recomend);
            Yii::$app->cache->set('recommended', $this->html, 604800);
        } else {
            $this->html = $recommended;
        }
        return $this->html;
    }

    protected function recommendedHtml($recomend)
    {
        ob_start();
        include __DIR__ . '/recommended_tpl/'  . $this->tpl;
        return ob_get_clean();
    }
}