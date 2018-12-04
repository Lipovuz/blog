<li>
    <?php
    if (!$category['slug']==null){
        $slug = $category['slug'];
    }else{
    $slug=$category['name'];
    }
        ?>
    <a href="<?=\yii\helpers\Url::to(['/site/index','category'=>$category['id'],'slug'=>$slug])?>">
        <?=$category['name']?>
        <?php if (isset($category['childs'])):?>
            <span class="badges pull-right">+</span>
        <?php endif;?>
    </a>
    <?php if (isset($category['childs'])):?>
        <ul>
            <?= $this->getMenuHtml($category['childs']) ?>
        </ul>
    <?php endif;?>
</li>

