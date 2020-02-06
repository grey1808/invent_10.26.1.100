<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CategoryLess */

$this->title = 'Добавить категорию';
$this->params['breadcrumbs'][] = ['label' => 'Category Lesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-less-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
