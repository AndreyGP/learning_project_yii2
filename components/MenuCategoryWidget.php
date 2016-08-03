<?php
namespace app\components;

use yii\base\Widget;
use app\models\Category;
use Yii;


class MenuCategoryWidget extends Widget
{
    public $tpl;
    public $data;
    public $tree;
    public $html;

    public function init()
    {
        parent::init();
        if ($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        $menu = Yii::$app->cache->get('cat_menu');
        if (empty($menu)){
            $this->data = Category::find()->asArray()->indexBy('id')->all();
            $this->tree = $this->mapTree();
            $this->html = $this->menuHtml($this->tree);
            Yii::$app->cache->set('cat_menu', $this->html, 604800);
        } else {
            $this->html = $menu;
        }
        //debug($this->html);
        return $this->html;
    }

    protected function mapTree() {
        $tree = array();
        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $this->data[$node['parent_id']]['children'][$node['id']] = &$node;
            }
        }
        return $tree;
    }

    protected function menuHtml($categories)
    {
        foreach ($categories as $item){
            $htmlStr .= $this->menuTemplade($item);
        }
        return $htmlStr;
    }

    protected function menuTemplade($category){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}