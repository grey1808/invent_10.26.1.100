<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\invent\models\TechnicsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Полный список техники';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="technics-index">

    <p>
        <?= Html::a('Печать отчета', ['print'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover table-technics'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'category_id',
                'headerOptions' => ['width' => '350'],
                'content'=>function($data){
                    return isset($data->category->name) ? $data->category->name : 'Корневая категория';
                },
                        'filter' => \app\modules\invent\models\Category::getParentsListSelect()
//                        'filter' => \app\modules\invent\models\Category::getParentsList2()
//                'filter' => false
            ],
            [
                'attribute'=>'tech_group_id',
                'headerOptions' => ['width' => '200'],
                'value'=>function($data){
                    return $data ->characteristics->name ? $data->characteristics->name : 'Не указанно';
                },
                'filter' => \app\modules\invent\models\Characteristics::getCharacteristicsList()
            ],
            [
                'attribute'=>'firm_id',
                'value'=>function($data){
                    return isset($data->firm->name) ? $data->firm->name : 'Не указанно';
                },
                'filter' => \app\modules\invent\models\Firm::getFirmList()
            ],
            'name',
            [
                'attribute'=>'model_id',
                'format'=>'raw',
                'value'=>function($data){
                    return isset($data->models->name) ? $data->models->name : '<span class="text-danger font-weight-bold">Не указанно</span>';
                },
                'filter' => \app\modules\invent\models\Technics::getModelList()
            ],
            'invent_number',
            'serial',
            //'params:ntext',
            [
                'attribute'=>'comment',
//                'headerOptions' => ['width' => '350'],
            ],
//            [
//                'class' => 'yii\grid\ActionColumn',
//                'header'=>'Действия',
//                'headerOptions' => ['width' => '100'],
//                'template' => '{view} {update} {delete}',
//                'buttons' => [
//                    'view' => function ($url) {
//                        return Html::a(
//                            '<button type="button" class="btn btn-info"title="Просмотр"><i class="glyphicon glyphicon-eye-open"></i></button>',
//                            $url);
//                    },
//                    'update' => function ($url) {
//                        return Html::a(
//                            '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalTrEdit" title="Редактировать"><i class="glyphicon glyphicon-pencil"></i></button>',
//                            $url);
//                    },
//                    'delete' => function ($url) {
//                        return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url,
//                            [
//                                'class' => 'btn btn-danger btn-a',
//                                'data' => [
//                                    'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
//                                    'method' => 'post',
//                                ],
//                            ]);
//                    },
//                ],
//            ],
        ],
    ]); ?>

</div>