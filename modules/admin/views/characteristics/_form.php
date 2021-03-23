<?php

use app\modules\admin\models\Characteristics;
use yii\helpers\Url;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Characteristics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="characteristics-form col-md-6">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?php
    $char = \app\modules\admin\models\CharacteristicsType::find()->all();
    $items = \yii\helpers\ArrayHelper::map($char,'id','name');
    $params = [
        'prompt' => 'Выберите параметр'
    ];
    echo $form->field($model, 'type_id')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <!--<div class="form-group">
        <?= Html::submitButton(Html::tag('i', '', ['class' => 'glyphicon glyphicon-edit']) .' Сохранить',['class' => 'btn btn-success']) ?>
        <?if(empty($model->id)):?>
            <?= Html::submitButton(Html::tag('i', '', ['class' => 'glyphicon glyphicon-check text-success']) .' Сохранить и выйти', ['class' => 'btn btn-default', 'formaction' => Url::to(['characteristics/saveout'])]);?>
            <?= Html::submitButton(Html::tag('i', '', ['class' => 'glyphicon glyphicon-share text-success']) .' Сохранить и создать', ['class' => 'btn btn-default', 'formaction' => Url::to(['characteristics/savecreate'])]);?>
        <?else:?>
            <?= Html::submitButton(Html::tag('i', '', ['class' => 'glyphicon glyphicon-check text-success']) .' Сохранить и выйти', ['class' => 'btn btn-default', 'formaction' => Url::to(['characteristics/updateout','id'=>$model->id])]);?>
            <?= Html::submitButton(Html::tag('i', '', ['class' => 'glyphicon glyphicon-share text-success']) .' Сохранить и создать', ['class' => 'btn btn-default', 'formaction' => Url::to(['characteristics/updatecreate','id'=>$model->id])]);?>
        <?endif;?>
        <?= Html::a(Html::tag('i', '', ['class' => 'glyphicon glyphicon-remove text-danger']) . ' Отменить',['index'], ['class' => 'btn btn-default', 'title' => 'Отменить']) ?>
    </div>-->

    <?php ActiveForm::end(); ?>

</div>

<div class="col-md-6">
    <?php Pjax::begin(); ?>

    <?php $form1 = ActiveForm::begin([
            'action' => Url::toRoute(['characteristics/update-dinam', 'id' => $model->id]),
            'options' => [
            'data-pjax' => '1'
        ],
        'id' => 'compositionUpdateForm',

    ]); ?>
<?php ?>
    <table class="table table-hover">
        <tr>
            <th>Наименование</th>
            <th>Комментарий</th>
            <th>Действие</th>
        </tr>
    <?php foreach ($model->characteristicsComposition as $key => $composition): ?>
        <tr>
            <td><?= $form1->field($composition, "[$key]name")->label(false) ?></td>
            <td><?= $form1->field($composition, "[$key]comment")->label(false) ?></td>
            <td>
                <?= Html::a('Удалить', Url::toRoute(['characteristics/delete-dinam', 'id' => $composition->id,'modelid' => $model->id]), [
                    'class' => 'btn btn-danger',
                ]) ?>
        </tr>
    <?php endforeach ?>
    </table>

        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Добавить поле', null, [
            'class' => 'btn btn-success',
            'data' => [
                'toggle' => 'reroute',
                'action' => Url::toRoute(['characteristics/create-dinam', 'id' => $model->id,'modelid' => $model->id])
            ]
        ]) ?>
        <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>

</div>