<?php
use app\modules\invent\models\Category;
//$model =  new Category();
?>




<?php
$request = Yii::$app->request->get('TechnicsSearch');
?>

<option
    value="<?= $category['id']?>"
    <?php if($category['id'] == $request['category_id']) echo ' selected'?>
    <?php if($category['id'] == $model->id) echo ' disabled'?>
    <?php  $infis = isset($category['code_infis']) ? $category['code_infis']. ' | ' :  $infis = ''?>
><?= $tab .$infis. $category['name']?></option>
<?php if( isset($category['childs']) ): ?>
    <ul>
        <?= $this->getMenuHtml($category['childs'], $tab . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;')?>
    </ul>
<?php endif;?>