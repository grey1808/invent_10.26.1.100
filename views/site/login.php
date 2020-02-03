<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->registerCssFile('/web/css/style-admin.css');
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            Панель управления сайтом</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12 login-box">
                <!--<div class="site-login">-->
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',

                ]); ?>

                <?= $form->field($model, 'username', ['template' =>"<div class=\"input-group\">
                                        <span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-user\"></span></span>
                                        {input}</div>"])->textInput(['placeholder' => "Имя пользователя",'autofocus' => true])->label('Логин')  ?>

                <?= $form->field($model, 'password',['template'=>"<div class=\"input-group\">
                                        <span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-lock\"></span></span>
                                        {input}</div>"])->passwordInput(['placeholder' => "Ваш пароль"])->label('Пароль') ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"\"><div class=\"checkbox\"><label>{input} {label}</label>
                                        </div></div>",
                ])->label('Запомнить меня') ?>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-sm-12">
                <?= Html::submitButton(Html::tag('span', Html::tag('i', '', ['class' => 'glyphicon glyphicon-ok']), ['class' => 'btn-label']) .' Войти', ['class' => 'btn btn-labeled btn-success right']) ?>
            </div>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

    <!--</div>-->
