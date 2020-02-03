<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Token */

$this->title = 'Добавить токен';
$this->params['breadcrumbs'][] = ['label' => 'Tokens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="token-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
