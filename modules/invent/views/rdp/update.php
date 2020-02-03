<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\Rdp */

$this->title = 'Обновить RDP: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rdps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container rdp-update">

    <div class="header-h1">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
