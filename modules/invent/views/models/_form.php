<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\Models */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">

    <div class="models-form">

        <?php $form = ActiveForm::begin(); ?>


        <?php
        $arr = \app\modules\admin\models\Firm::find()->all();
        $items = \yii\helpers\ArrayHelper::map($arr,'id','name');
        $params = [
            'prompt' => 'Выберите параметр'
        ];
        echo $form->field($model, 'firm_id')->dropDownList($items,$params);
        ?>

        <?= $form->field($model, 'name')->textInput() ?>

        <?= $form->field($model, 'comment')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
