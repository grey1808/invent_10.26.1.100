<li>
    <a href="<?=yii\helpers\Url::to(['category/view','id' => $category['id']])?>">
        <?= $category['code_infis'].' | '.$category['name']?>
        <?php if( isset($category['childs']) ): ?>

        <?php endif;?>
    </a>
    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif;?>
</li>

