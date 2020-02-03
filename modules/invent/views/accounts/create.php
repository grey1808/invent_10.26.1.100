<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\Accounts */

$this->title = 'Добавить учетную запись';
$this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container accounts-create">

    <div class="header-h1">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
