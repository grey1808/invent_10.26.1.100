<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\Rdp */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rdps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container rdp-view">

    <div class="header-h1">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'ipaddress',
            'connect_id',
            'connect_pass',
            'structure_id',
            'technics_id',
            'comment',
        ],
    ]) ?>

</div>
