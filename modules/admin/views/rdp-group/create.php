<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\RdpGroup */

$this->title = 'Добавить группу';
$this->params['breadcrumbs'][] = ['label' => 'Rdp Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rdp-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
