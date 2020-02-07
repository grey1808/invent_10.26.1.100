<?php
use yii\helpers\Html;

$this->title = $lesson->name;
$this->params['breadcrumbs'][] = $this->title;
?>




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
                    <form method="get" action="/invent/lesson/search" role="search">

                        <div class="col-md-8 search-input">
                                        <span class="twitter-typeahead">
                                            <input class="form-control" name="q" placeholder="Введие текст поиска...">
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


<section id="content">
    <div class="container">
        <?php if (!empty($lesson)):?>
            <div class="row">
                <div class="col-md-12">
                    <div class="header-h1">
                        <h1 class="text-center"><?=$this->title?></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 lesson-content">
                    <?=$lesson->content?>
                </div>
                <div class="col-md-2"></div>
            </div>

        <?php else:;?>
            <h2 class="text-center">Пустая статья</h2>
        <?php endif;?>
    </div>
</section>
