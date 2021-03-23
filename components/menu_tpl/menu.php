<li>
    <a href="<?=yii\helpers\Url::to(['category/view','id' => $category['id']])?>">



        <?php
            if (isset($category['code_infis'])){
                echo $category['code_infis'].' | '.$category['name'];
            }else{
                echo $category['name'];
            }
        ?>
        <?php if( isset($category['childs']) ): ?>

        <?php endif;?>
    </a>
    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif;?>
</li>

