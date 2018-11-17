<?php
use yii\helpers\Url;
?>
<div class="">
    <div class="article-wrapper">
        <a href="<?=Url::to(['/profile/article/view','id'=>$model->id])?>">
            <div class="article-header">
                <p><?= $model->name ?></p>
            </div></a>
        <div class="article-body">
            <?=$model->description?>
        </div>
    </div>
</div>