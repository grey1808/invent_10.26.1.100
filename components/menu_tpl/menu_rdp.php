<li>
    <a href="<?=yii\helpers\Url::to(['/invent/rdp',
        'category_id' => $category['id'],
    ])?>">


        <?php
        if (isset($category['code_infis'])){
            echo $category['code_infis'].' | '.$category['name'];
        }else{
            if (isset($category['cabinet'])){
                echo $category['cabinet'].' кабинет '.$category['name'];
            }else{
                echo $category['name'];
            }

        }
        ?>
        <?php if( isset($category['childs']) ): ?>
            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
        <?php endif;?>
    </a>
    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif;?>
</li>

