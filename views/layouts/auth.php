<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ItAppAsset;
//use kartik\typeahead\Typeahead;
//use app\models\News;
//use Yii;

AppAsset::register($this);
ItAppAsset::register($this);
//mihaildev\elfinder\Assets::noConflict($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Отключение жеста масштабируемости-->
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, maximum-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<section id="auth">
    <div class="container">
        <div class="row">
            <div class="auth">


                <?=$content;?>

                <!--<form role="form">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control" placeholder="Имя пользователя" required autofocus />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" class="form-control" placeholder="Ваш пароль" required />
                    </div>
                    <div class="">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="Remember">
                                Запомнить меня
                            </label>
                        </div>
                    </div>
                    <!--<p>-->
                <!--<a href="#">Забыли свой пароль?</a></p>-->
                <!--У вас нет аккаунта? <a href="#">Регистрация</a>
            </form>-->


            </div>
        </div>
    </div>
    </div>
</section>
<?//echo \app\controllers\AppController::Inf()/*Yii::$app->controller->ymetr*/;?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?><?php
