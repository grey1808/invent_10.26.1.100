<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAppAsset;
use app\assets\ItAppAsset;

AdminAppAsset::register($this);
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

    <section id="header-admin">
        <div class="container-fluid">
            <nav class="navbar navbar-default " role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?=Url::base(true).'/admin'?>"><?= Html::img('@web/img/admin-img.png', ['alt' => 'Админка']) ?></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <!--<li class="active"><a href="#">Ссылка</a></li>-->
                            <li>
                                <a href="<?=Url::base(true).'/admin'?>">Панель управления</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <!--<li><p>Вы зашли под: <span>Admin</span></p></li>-->
                            <!--<li><p>Доступ: <span>root</span></p></li>-->
                            <!--<li></li>-->
                            <li>
                                <a href="<?=Url::base(true);?>">Перейти в приложение <i class="glyphicon glyphicon-share-alt"></i> </a>
                            </li>
                            <!--<li><a href="#" >Выход <i class="glyphicon glyphicon-log-in"></i></a></li>-->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= Yii::$app->user->identity['username']?> <i class="glyphicon glyphicon-tower"></i> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=\yii\helpers\Url::to(['/site/logout'])?>">Выход <i class="glyphicon glyphicon-log-in"></i></a></li>
                                    <!--                                <li><a href="#">Доступ: root</a></li>-->
                                    <!--<li><a href="#">Что-то еще</a></li>-->
                                    <li class="divider"></li>
                                    <li><a href="<?=Url::base(true);?>" >Перейти в приложение <i class="glyphicon glyphicon-share-alt"></i> </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>


    </section>
    <section id="content-admin">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-admin-edit container-fluid">
                        <h3><?= $this->params['title']?></h3>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 content-admin-left">
                    <!--<div class="logo-admin"><img class="center-block" src="img/logo-admin.png"></div>-->
                    <?= Nav::widget([
                        'options' => ['class' => 'nav nav-pills nav-stacked'],
                        'items' => [

                            ['label' => 'Категории', 'url' => ['/admin/category/index']],
                            ['label' => 'Характеристики ТО', 'url' => ['/admin/characteristics/index']],
                            ['label' => 'Производители', 'url' => ['/admin/firm/index']],
                            ['label' => 'Техника', 'url' => ['/admin/technics/index']],
                            ['label' => 'Пользователи', 'url' => ['/admin/user']],
                            ['label' => 'Группы токенов', 'url' => ['/admin/token-group']],
                            ['label' => 'Токены', 'url' => ['/admin/token']],
                            ['label' => 'Локации', 'url' => ['/admin/location']],
                            ['label' => 'Группа RDP', 'url' => ['/admin/rdp-group']],
                            ['label' => 'RDP', 'url' => ['/admin/rdp']],
                            ['label' => 'Серверы', 'url' => ['/admin/servers']],
                            ['label' => 'Категории статей', 'url' => ['/admin/category-less']],
                            ['label' => 'Статьи', 'url' => ['/admin/lesson']],
                        ],
                    ]);?>

                </div>
                <div class="col-lg-10 col-md-9">
                    <?=$content?>
                </div>
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
                    <p class="text-center">Инвентаризация районных больниц. Проект 2019 года.</p>
                </div>
            </div>
        </div>
    </section>


    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>