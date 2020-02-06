<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CategoryLess */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-less-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'parent_id')->textInput() ?>-->

    <div class="form-group field-categoryless-parent_id has-success">
        <label class="control-label" for="categoryless-parent_id">Родительская категория</label>
        <select id="categoryless-parent_id" class="form-control" name="Categoryless[parent_id]">
            <option value="0">Корневая категория</option>
            <?= \app\components\CategorylessWidget::widget(['tpl' => 'select', 'model' => $model])?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
