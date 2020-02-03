<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TechGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tech-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    $arr = \app\modules\admin\models\Characteristics::find()->all();
    $items = \yii\helpers\ArrayHelper::map($arr,'id','name');
    $params = [
        'prompt' => 'Выберите параметр'
    ];
    echo $form->field($model, 'characteristics_id')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
