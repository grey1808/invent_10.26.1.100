<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\invent\models\TokenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Токены';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="token-index">

    <div class="header-h1">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="container">

    <p>
        <?= Html::a('Добавить ЭЦП', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'pager' => [
            'firstPageLabel' => 'Начало',
            'lastPageLabel' => 'Конец',
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute'=>'token_group_id',
                'options' => ['width' => '400'],
                'value'=>function($data){
                    return $data->groupToken->name;
                },
                'filter' => \app\modules\invent\models\Token::getTokenGroupList()
            ],
//            'fullname',
            [
                'attribute'=>'fullname',
                'options' => ['width' => '800']
            ],
//            [
//                'attribute'=>'startdate',
//                'options' => ['width' => '600'],
//                'format'=>'text',
//                'filter'=> \kartik\widgets\DatePicker::widget([
//                    'name'  => 'TokenSearch[startdate]',
//                    'pluginOptions'=>['format' => 'yyyy-mm','autoclose' => true,'minViewMode' => 1,]]),
//                'content'=>function($data){
//                    return Yii::$app->formatter->asDate($data['startdate'],'php:d.m.Y');
//                }
//            ],
            [
                'attribute'=>'enddate',
                'options' => ['width' => '600'],
                'format'=>'text',
                'filter'=> \kartik\widgets\DatePicker::widget([
                    'name'  => 'TokenSearch[enddate]',
                    'pluginOptions'=>['format' => 'yyyy-mm','autoclose' => true,'minViewMode' => 1,]]),
                'content'=>function($data){
                    return Yii::$app->formatter->asDate($data['enddate'],'php:d.m.Y');
                }
            ],
//            [
//                'attribute'=>'token_nubmer',
//                'options' => ['width' => '300']
//            ],
            //'user_id',
//            'comment',

            [
                'attribute'=>'position_id',
                'options' => ['width' => '1000'],
                'content'=>function($data){
                    return (int)$data['enddate'] === 1 ? 'Врач' : 'Фельдшер';
                }
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'options' => ['width' => '300'],
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

