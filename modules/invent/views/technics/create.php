<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\Technics */

$this->title = 'Добавить технику';
$this->params['breadcrumbs'][] = ['label' => 'Technics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container technics-create">
    <div class="header-h1">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
