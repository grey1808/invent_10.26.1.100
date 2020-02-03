<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\Token */

$this->title = 'Добавить токен';
$this->params['breadcrumbs'][] = ['label' => 'Tokens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container token-create">

<div class="header-h1">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
