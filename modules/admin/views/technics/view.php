<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Technics */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Technics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="technics-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['Обновить', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['Удалить', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
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
                    return isset($data->techGroup->name) ? $data->techGroup->name : 'Не указанно';
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
