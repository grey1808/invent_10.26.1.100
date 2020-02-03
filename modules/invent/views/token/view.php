<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\Token */

$this->title = 'Просмотр ЭЦП: ' .$model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Tokens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container token-view">

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
            [
                'attribute'=>'token_group_id',
                'options' => ['width' => '200'],
                'value'=>function($data){
                    return $data->groupToken->name;
                }
            ],
            'fullname',
            'startdate',
            'enddate',
            'token_nubmer',
//            'user_id',
            'comment',
        ],
    ]) ?>

</div>
