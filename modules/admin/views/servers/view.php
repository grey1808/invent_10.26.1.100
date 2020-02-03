<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Servers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Servers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="servers-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            [
                'attribute'=>'parent_id',
                'format' => 'raw',
                'value'=>function($data){
                    return isset($data->server->name) ? '<p class="text-info">'.$data->server->name.'</p>' : '<strong class="text-success">Физический сервер</strong>';
                }
            ],
            'name',
            'ipaddress_close',
            'ipaddress_free',
            [
                'attribute'=>'technics_id',
                'value'=>function($data){
                    return isset($data->technics->name) ? $data->technics->name : 'Не указанно';
                }
            ],
            'comment',
        ],
    ]) ?>

</div>
