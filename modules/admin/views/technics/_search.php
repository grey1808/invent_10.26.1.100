<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TechnicsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="technics-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tech_group_id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'firm_id') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'invent_number') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'serial') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
