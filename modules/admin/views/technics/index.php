<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TechnicsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Техника';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technics-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить единицу техники', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'tech_group_id',
                'value'=>function($data){
                    return isset($data ->characteristics->name) ? $data->characteristics->name : 'Не указанно';
                }
            ],
            [
                'attribute'=>'category_id',
                'value'=>function($data){
                    return isset($data->category->name) ? $data->category->name : 'Корневая категория';
                },
                'filter' => \app\modules\invent\models\Category::getParentsListSelect()
            ],
            [
                'attribute'=>'firm_id',
                'value'=>function($data){
                    return isset($data -> firm->name) ? $data->firm->name : 'Не указанно';
                }
            ],
            'name',
            'invent_number',
            'model',
            'serial',
            'comment',

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
