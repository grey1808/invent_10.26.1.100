<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\Rdp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rdp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipaddress')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(),['mask' => '99[9].9[9][9].9.[9][9][9]',]) ?>

    <?= $form->field($model, 'connect_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'connect_pass')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-category-structure_id required has-success">
        <label class="control-label" for="category-structure_id">Подразделение</label>
        <select id="category-structure_id" type="text" class="form-control" name="Rdp[structure_id]">
            <option value="0">Корневая категория</option>
            <?= \app\components\MenuWidget::widget(['tpl' => 'select_structure', 'model' => $model])?>
        </select>
    </div>

    <?php
    $items = [
        '0' => 'Не установлен',
        '1' => 'Установлен'
    ];
    ?>

    <?= $form->field($model, 'vipnet')->dropDownList($items)?>

    <?= $form->field($model, 'vipnet_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'connect_pass')->textInput(['maxlength' => true]) ?>

    <?php
    $array = \app\modules\admin\models\Technics::find()->all();
    $items = ArrayHelper::map($array,'id','name');
    $params = [
        'prompt' => 'Выберите технику'
    ];
    ?>

    <?= $form->field($model, 'technics_id')->dropDownList($items,$params) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
