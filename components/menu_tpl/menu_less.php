<?php

?>

<li>

    <a href="<?=yii\helpers\Url::to(['lesson/view-list','id' => $category['id']])?>">
        <?= $category['name']?>
    </a>
    <?php if( isset($category['childs']) ): ?>

    <?php endif;?>
    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif;?>
</li>

