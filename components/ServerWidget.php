<?php


namespace app\components;


use app\modules\invent\models\Servers;
use yii\base\Widget;

class ServerWidget extends Widget
{

    public $model;
    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;
    public function init ()
    {
        parent::init();
        if ($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl.= '.php';
    }

    public function run ()
    {
//        if($this->tpl == 'menu.php'){
//            $menu = Yii::$app->cache->get('menu');
//        }
//        if($this->tpl == 'select.php'){
//            $menu = Yii::$app->cache->get('select');
//        }
//        if($this->tpl == 'select_iplist.php'){
//            $menu = Yii::$app->cache->get('select_iplist');
//        }
//        unset($menu);
        // get cache (получить меню из кеша)

        if(isset($menu)) return $menu;

        $this->data = Servers::find()->indexBy('id')/*->orderby(['code_infis'=>SORT_ASC])*/->asArray()->all();

        $this->tree = $this->getTree();
//    debug($this->tree);
        $this->menuHtml = $this->getMenuHtml($this->tree);

        if($this->tpl == 'menu.php'){
            // set cache (записать меню в память)
            Yii::$app->cache->set('menu', $this->menuHtml, 3);// время жизни кеша
        }

        return $this->menuHtml;
    }

    protected function getTree(){

        $tree = [];
        foreach ($this->data as $id =>&$node){

            if(!$node['parent_id'])
                $tree[$id] =&$node;
            else
                $this->data[$node['parent_id']] ['childs'][$node['id']]= &$node;

        }
        return $tree;
    }
    protected function getMenuHtml($tree, $tab= ''){
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

    protected function getMenuHtml2($tree, $tab= ''){
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate2($category, $tab);
        }
        return $str;
    }

    protected function catToTemplate2($category, $tab){
        ob_start();
        include __DIR__ . '/menu_tpl/menu.php';
        return ob_get_clean();
    }




}