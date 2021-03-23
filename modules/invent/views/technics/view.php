<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\Technics */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Technics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container technics-view">

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
                'attribute'=>'tech_group_id',
                'value'=>function($data){
                    return $data ->characteristics->name ? $data->characteristics->name : 'Не указанно';
                },
             ],
            [
                'attribute'=>'category_id',
                'value'=>function($data){
                    return isset($data->category->name) ? $data->category->name : 'Не указанно';
                },
            ],
            [
                'attribute'=>'firm_id',
                'value'=>function($data){
                    return isset($data->firm->name) ? $data->firm->name : 'Не указанно';
                },
            ],
            'name',
            'invent_number',
            'model',
            'serial',
            'params:ntext',
            'comment',
            [
                'attribute'=>'create_person_id',
                'value'=>function($data){
                    return isset($data->usercreate->username) ? $data->usercreate->username : 'Не указанно';
                }
            ],
            [
                'attribute'=>'update_person_id',
                'value'=>function($data){
                    return isset($data->userupdate->username) ? $data->userupdate->username : 'Не указанно';
                }
            ],
        ],
    ]) ?>

</div>
