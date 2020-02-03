<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\LocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Локации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a('Добавить локацию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'structure_id',
            [
                'attribute'=>'structure_id',
                'value'=>function($data){
                    return $data->category->name ? $data->category->name : 'Корневая категория';
                }
            ],
//            'technics_id',
            [
                'attribute'=>'technics_id',
                'value'=>function($data){
                    return $data->technics->name ? $data->technics->name : 'Не указано';
                }
            ],
//            'programs_id',
            'invent_number',
            //'create_datetime',
            //'update_datetime:datetime',
            //'user_id',


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
