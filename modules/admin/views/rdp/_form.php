<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Rdp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rdp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    $arr = \app\modules\admin\models\RdpGroup::find()->all();
    $items = \yii\helpers\ArrayHelper::map($arr,'id','name');
    $params = [
        'prompt' => 'Выберите параметр'
    ];
    echo $form->field($model, 'rdp_group_id')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'ipaddress')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(),['mask' => '99[9].9[9][9].9.[9][9][9]',]) ?>


    <div class="form-group field-rdp-structure_id has-success">
        <label class="control-label" for="rdp-structure_id">Категория</label>
        <select id="structure_id" class="form-control" name="Rdp[structure_id]">
            <option value="0">Выбор категории</option>
            <?= \app\components\MenuWidget::widget(['tpl' => 'select_structure', 'model' => $model])?>
        </select>
    </div>

<!--    --><?//= $form->field($model, 'technics_id')->textInput() ?>

    <?= $form->field($model, 'technics_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\modules\admin\models\Technics::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Выбор техники',
        ]
    ) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
