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

    <p>
        <?= Html::a('Добавить ЭЦП', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute'=>'token_group_id',
                'options' => ['width' => '200'],
                'value'=>function($data){
                    return $data->groupToken->name;
                },
                'filter' => \app\modules\invent\models\Token::getTokenGroupList()
            ],
            'fullname',
            [
                'attribute' => 'startdate',
                'format' =>  ['date', 'dd.MM.Y'],
                'options' => ['width' => '200']
            ],
            [
                'attribute' => 'enddate',
                'format' =>  ['date', 'dd.MM.Y'],
                'options' => ['width' => '200']
            ],
            'token_nubmer',
            //'user_id',
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
