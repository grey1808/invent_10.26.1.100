<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\RdpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'RDP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rdp-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a('Добавить RDP', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'ipaddress',
//            'structure_id',
            [
                'attribute'=>'structure_id',
                'value'=>function($data){
                    return isset($data->category->name) ? $data->category->name : 'Корневая категория';
                },
            ],
            [
                'attribute'=>'technics_id',
                'value'=>function($data){
                    return isset($data->technics->name) ? $data->technics->name : 'Не указано';
                }
            ],

            [
                'attribute'=>'technics_id',
                'label' => 'Коментарий техники',
                'value'=>function($data){
                    return isset($data->technics->comment) ? $data->technics->comment : 'Не указано';
                },
            ],

            //'comment',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
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
