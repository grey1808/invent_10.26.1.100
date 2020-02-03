<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ItAppAsset;

AppAsset::register($this);
ItAppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <?php \Yii::$app->view->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => Url::to(['/favicon.ico'])]);?> <!-- Иконка-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

    </head>
    <body>
    <?php $this->beginBody() ?>

    <section id="header">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?=Url::base(true).'/invent/rdp'?>">Инв АСУ</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
<!--                            <li class="dropdown">-->
<!--                                <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Инвенторизация <span class="caret"></span></a>-->
<!--                                <ul class="dropdown-menu">-->
<!--                                    <li><a href="--><?//=Url::base(true).'/invent/rdp'?><!--">Удаленка</a></li>-->
<!--                                    <li><a href="--><?//=Url::base(true).'/invent'?><!--">Перемещение</a></li>-->
<!--                                    <li><a href="#">ЭЦП</a></li>-->
<!--                                    <li><a href="#">Отчеты</a></li>-->
<!--                                    <li role="separator" class="divider"></li>-->
<!--                                    <li><a href="--><?//=Url::base(true).'/admin'?><!--">Админка</a></li>-->
<!--                                    <li role="separator" class="divider"></li>-->
<!--                                    <li><a href="#">One more separated link</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->

                            <li><a href="<?=Url::base(true).'/invent'?>">Перемещение</a></li>
                            <li><a href="<?=Url::base(true).'/invent/rdp'?>">Удаленка</a></li>
                            <li><a href="<?=Url::base(true).'/invent/servers'?>">Серверы</a></li>
                            <li><a href="<?=Url::base(true).'/invent/token'?>">ЭЦП</a></li>
                            <li><a href="<?=Url::base(true).'/invent/accounts'?>">Аккаунты</a></li>
<!--                            <li><a href="--><?//=Url::base(true).'/invent/lesson'?><!--">Методичка</a></li>-->
<!--                            <li><a href="#">Отчеты</a></li>-->
                        </ul>
                        <ul class="nav navbar-nav navbar-right">

                            <li><a href="<?=Url::base(true).'/admin'?>">Админка</a></li>
<!--                            <li><a href="#">Помощь</a></li>-->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= Yii::$app->user->identity['username']?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=\yii\helpers\Url::to(['/site/logout'])?>">Выйти</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Доп ссылка</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </section>
    <section id="content">
        <div class="container-fluid">
            <div class="row">
                <!--<div class="col-md-3">
                    <div class="header-h1">
                        <h1>Структура</h1>
                    </div>
                    <div class="menu">
                        <ul>
                            <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                        </ul>
                    </div>
                </div>-->
                <div class="col-md-12">
                    <?=$content?>
                </div>
            </div>
        </div>
    </section>

    <section id="footer-bottom">
        <div class="container">
            <div class="col-md-12">
                <div>
<!--                    --><?//= Html::img('@web/img/logo-gerb.png')?>
                    <!--                    <i class="fa fa-usb" aria-hidden="true"></i>-->
                    <p class="text-center">Инвентаризация районных больниц. Проект 2019-2020 года.</p>
                </div>
            </div>
        </div>
    </section>


    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>