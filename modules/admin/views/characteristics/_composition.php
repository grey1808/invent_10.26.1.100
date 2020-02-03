<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<?= Html::a('Добавить адрес', null, [
    'class' => 'btn btn-success',
    'data' => [
        'toggle' => 'reroute',
        'action' => Url::toRoute(['characteristics/create-dinam', 'сharacteristicsId' => $model->id])
    ]
]) ?>
