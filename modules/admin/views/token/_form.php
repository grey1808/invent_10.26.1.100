<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Token */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="token-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'token_group_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\modules\admin\models\TokenGroup::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Выбор группы',
        ]
    ) ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'startdate')->widget(DatePicker::class) ?>

    <?= $form->field($model, 'enddate')->widget(DatePicker::class) ?>

    <?= $form->field($model, 'token_nubmer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
