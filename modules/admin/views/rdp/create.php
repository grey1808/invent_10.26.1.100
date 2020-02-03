<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Rdp */

$this->title = 'Добавить RDP';
$this->params['breadcrumbs'][] = ['label' => 'Rdps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rdp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
