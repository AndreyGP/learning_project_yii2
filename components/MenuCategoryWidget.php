<?php
namespace app\components;

use yii\base\Widget;
use app\models\Category;
use Yii;


class MenuCategoryWidget extends Widget
{
    public $id;
    public $tpl;
    public $model;
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
        if ($this->tpl == 'menu.php'){
            $menu = Yii::$app->cache->get('cat_menu');
            if (!empty($menu)) return $menu;
        }
        $this->id = Yii::$app->request->get('id') ? Yii::$app->request->get('id') : false;
        $this->data = Category::find()->asArray()->indexBy('id')->all();
        $this->tree = $this->mapTree();
        $this->html = $this->menuHtml($this->tree);

        if ($this->tpl == 'menu.php'){
            Yii::$app->cache->set('cat_menu', $this->html, 604800);
        }

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

    protected function menuHtml($categories, $tab = false)
    {
        $htmlStr = '';
        foreach ($categories as $item){
            $htmlStr .= $this->menuTemplade($item, $tab);
        }
        return $htmlStr;
    }

    protected function menuTemplade($category, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}