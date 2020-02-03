<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Technics */

$this->title = 'Добавить технику';
$this->params['breadcrumbs'][] = ['label' => 'Technics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technics-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
