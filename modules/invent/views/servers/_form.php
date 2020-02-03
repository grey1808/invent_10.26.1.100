<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\invent\models\Servers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servers-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'parent_id')->textInput() ?>-->

    <div class="form-group field-servers-parent_id required has-success">
        <label class="control-label" for="servers-parent_id">Родитель</label>
        <select id="servers-parent_id" type="text" class="form-control" name="Servers[parent_id]">
            <option value="0">Выбрать родителя</option>
            <?= \app\components\ServerWidget::widget(['tpl' => 'select', 'model' => $model])?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipaddress_close')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipaddress_free')->textInput() ?>

    <?= $form->field($model, 'technics_id')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
