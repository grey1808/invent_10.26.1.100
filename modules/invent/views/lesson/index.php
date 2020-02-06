<?php
use yii\helpers\Html;

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>



<section id="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/"><i class="glyphicon glyphicon-home"></i>Главная</a></li>
            <li><a href="/invent/lesson"><?=$this->title?></a></li>
            <li class="active">Контактная информация</li>
        </ol>
    </div>

</section>

<section id="header-material" style="background-image: url(/web/upload/global/images/soty-priroda-fon-zima-fonari.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?=Yii::$app->request->referrer?>"><button class="btn btn-default"><img src="/web/img/arrow-left-black.png" alt="">Вернуться</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="left-header-material">
                            <div class="vcenter">
                                <div class="">
                                    <img src="/web/img/article.png" alt="">
                                </div>
                                <div class="left-header-material-span">
                                    <span><?= Html::encode($this->title) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="menu-search" ">
                    <div class=" search animated bounceInLeft">
                        <form method="get" action="/site/search" role="search">

                            <div class="col-md-8 search-input">
                                        <span class="twitter-typeahead">
                                            <input class="form-control" name="search" placeholder="Введие текст поиска...">
                                        </span>
                            </div>
                            <div class="col-md-4 search-btn-div">
                                <button type="submit" class="btn btn-default search-btn">
                                    <img src="/web/img/search-icon-white.png">Найти
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
</section>


<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="menu">
                <?= \app\components\CategorylessWidget::widget(['tpl' => 'menu_less', 'model' => $model])?>
            </div>
        </div>
        <div class="col-md-9">
            <?php if (isset($lesson)):?>
                <?php foreach ($lesson as $item):?>
                    <div class="lesson">
                        <a href="<?=\yii\helpers\Url::to(['invent/view', 'alias'=>$item->alias]) ?>"><h2><?=$item->name?></h2></a>
                        <?=\yii\helpers\StringHelper::truncate(strip_tags($item->content), 400, '...');?>
                        <a href="<?=\yii\helpers\Url::to(['invent/view', 'alias'=>$item->alias]) ?>">Читать далее..</a>
                    </div>
                <?php endforeach;?>
            <?php endif;?>


        </div>
    </div>
</div>