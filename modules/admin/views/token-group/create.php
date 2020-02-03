<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TokenGroup */

$this->title = 'Добавить группу токенов';
$this->params['breadcrumbs'][] = ['label' => 'Token Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="token-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
