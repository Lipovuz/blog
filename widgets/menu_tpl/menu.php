<li>
    <a href="<?=\yii\helpers\Url::to(['category/view','slug'=>$category['slug']])?>">
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

