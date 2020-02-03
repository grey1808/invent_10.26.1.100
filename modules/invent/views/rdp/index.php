<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\invent\models\RdpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Удаленные подключения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rdp-index">

    <div class="header-h1">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить RDP', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute'=>'name',
                'headerOptions' => ['width' => '300'],
            ],
            'ipaddress',
            'connect_id',
//            'connect_pass',
            [
                'attribute'=>'structure_id',
//                'headerOptions' => ['width' => '350'],
                'value'=>function($data){
                    return isset($data->categoryall->name) ? $data->categoryall->name : 'Корневая категория';
                },
                'filter' => \app\modules\invent\models\Category::getParentsList()
            ],
            [
                'attribute'=>'technics_id',
                'value'=>function($data){
                    return isset($data->technics->name) ? $data->technics->name : 'Не указанно';
                }
            ],
            [
                'attribute'=>'vipnet',
                'value'=>function($data){
                    return $data->vipnet == 1 ? 'VipNet':'Не задан';
                },
                'filter' => array("1"=>"Установлен","0"=>"Не установлен"),
            ],
//            'vipnet_name',
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
