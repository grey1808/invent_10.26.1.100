<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\RdpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rdp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'ipaddress') ?>

    <?= $form->field($model, 'connect_id') ?>

    <?= $form->field($model, 'connect_pass') ?>

    <?php // echo $form->field($model, 'structure_id') ?>

    <?php // echo $form->field($model, 'technics_id') ?>

    <?php // echo $form->field($model, 'vipnet') ?>

    <?php // echo $form->field($model, 'vipnet_name') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
