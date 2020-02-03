<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TechGroup */

$this->title = 'Добавить группу';
$this->params['breadcrumbs'][] = ['label' => 'Tech Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tech-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
