<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\Token */
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

    <?= $form->field($model, 'startdate')->textInput() ?>

    <?= $form->field($model, 'enddate')->textInput() ?>

    <?= $form->field($model, 'token_nubmer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
