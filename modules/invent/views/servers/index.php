<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\invent\models\ServersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список серверов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servers-index">
    <div class="header-h1">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить сервер', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute'=>'parent_id',
                'format' => 'raw',
                'value'=>function($data){
                    return isset($data->server->name) ? '<span class="text-info">'.$data->server->name.'</span>' : '<strong class="text-success">Физический сервер</strong>';
                },
                'filter' => \app\modules\invent\models\Servers::getParentsList()
            ],
            'name',
            'ipaddress_close',
            'ipaddress_free',
            [
                'attribute'=>'technics_id',
                'value'=>function($data){
                    return isset($data->technics->name) ? $data->technics->name : 'Не указанно';
                },
                'filter' => \app\modules\invent\models\Technics::getTechnicssList()
            ],
            'comment',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'headerOptions' => ['width' => '100'],
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a(
                            '<button type="button" class="btn btn-info"title="Просмотр"><i class="glyphicon glyphicon-eye-open"></i></button>',
                            $url);
                    },
                    'update' => function ($url) {
                        return Html::a(
                            '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalTrEdit" title="Редактировать"><i class="glyphicon glyphicon-pencil"></i></button>',
                            $url);
                    },
                    'delete' => function ($url) {
                        return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url,
                            [
                                'class' => 'btn btn-danger btn-a',
                                'data' => [
                                    'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                                    'method' => 'post',
                                ],
                            ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
