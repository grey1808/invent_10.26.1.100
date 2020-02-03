<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\Token */

$this->title = 'Обновить ЭЦП: ' . $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Tokens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container token-update">

    <div class="header-h1">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
