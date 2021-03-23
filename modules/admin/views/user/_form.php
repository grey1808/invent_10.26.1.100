<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'surnname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'partname')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'birthdate')->widget(DatePicker::class, [
        'options' => [
            'value' => Yii::$app->formatter->asDate($model->birthdate,'php:d.m.Y'),
        ],
    ]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'phonenumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_group_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\modules\admin\models\UserGroup::find()->all(), 'id', 'content'),
        [
            'prompt' => 'Выбор роли',
        ]
    ) ?>

    <?= $form->field($model, 'status')->dropDownList([
        '0' =>'Включен',
        '1' =>'Отключен',
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
