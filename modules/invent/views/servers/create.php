<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\Servers */

$this->title = 'Добавить сервер';
$this->params['breadcrumbs'][] = ['label' => 'Servers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container servers-create">
    <div class="header-h1">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
