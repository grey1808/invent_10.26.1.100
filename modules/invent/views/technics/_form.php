<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Technics */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile('@web/js/technicsHelpAdminForm.js');
//$this->registerJsFile(Yii::getAlias('@web/js/technicsHelpAdminForm.js'),['position' => yii\web\View::POS_END]);
?>

<?php
$js = <<<JS

    $('#technics-firm_id').change(function () {
        load()
    })

function load() {
        var firm_id =  $('#technics-firm_id').val();        
        $.ajax({
            type: "POST",
            url: '/invent/technics/autocomplete', // куда шлем запрос
            cache: false,
            dataType: 'json',
            data: {
                firm_id: firm_id
            },
            success: function (res) {
                console.log(res)
                $('#technics-model_id').hide().fadeIn(500).html(res);

            },
            error: function(request, status, error, html) {
                console.log(JSON.stringify(request));
            }
        });
}
     

JS;

$this->registerJs($js);

?>
<div class="technics-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
        <?php
        $arr = \app\modules\admin\models\Characteristics::find()->where('type_id = :type_id', [':type_id' => 1])->all();
        $items = \yii\helpers\ArrayHelper::map($arr,'id','name');
        $params = [
            'prompt' => 'Выберите параметр'
        ];
        echo $form->field($model, 'tech_group_id')->dropDownList($items,$params);
        ?>

        <div class="form-group field-technics-category_id required has-success">
            <label class="control-label" for="technics-category_id">Подразделение</label>
            <select id="technics-category_id" type="text" class="form-control" name="Technics[category_id]">
                <option value="0">Корневая категория</option>
                <?= \app\components\MenuWidget::widget(['tpl' => 'select_iplist', 'model' => $model])?>
            </select>
        </div>

        <?php
        $arr = \app\modules\admin\models\Firm::find()->all();
        $items = \yii\helpers\ArrayHelper::map($arr,'id','name');
        $params = [
            'prompt' => 'Выберите параметр'
        ];
        echo $form->field($model, 'firm_id')->dropDownList($items,$params);
        ?>

        <?php
        $arr = \app\modules\admin\models\Models::find()->where(['firm_id'=>$model->firm_id])->all();
        $items = \yii\helpers\ArrayHelper::map($arr,'id','name');
        $params = [
            'prompt' => 'Выберите параметр'
        ];
        echo $form->field($model, 'model_id')->dropDownList($items,$params);
        ?>



        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'invent_number')->textInput() ?>

        <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'params')->textInput(['maxlength' => true,'class' => 'hidden'])->label(false)?>

        <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(Html::tag('i', '', ['class' => 'glyphicon glyphicon-ok']) .' Сохранить',['class' => 'btn btn-success']) ?>
            <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-remove text-danger']) . ' Отменить',['index'], ['class' => 'btn btn-default', 'title' => 'Отменить']) ?>
        </div>

        <div class="col-md-6 params">

        </div>
    </div>


    <?php ActiveForm::end(); ?>




    <div class="col-md-6">
        <div id="list"></div>
    </div>

</div>
