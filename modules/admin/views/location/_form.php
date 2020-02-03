<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Location */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group field-category-structure_id has-success">
        <label class="control-label" for="category-structure_id">Родительская категория</label>
        <select id="structure_id" class="form-control" name="Location[structure_id]">
            <option value="0">Корневая категория</option>
            <?= \app\components\MenuWidget::widget(['tpl' => 'select_structure', 'model' => $model])?>
        </select>
    </div>

    <?= $form->field($model, 'technics_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\modules\admin\models\Technics::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Выбор техники',
        ]
    ) ?>
    <?= $form->field($model, 'invent_number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
