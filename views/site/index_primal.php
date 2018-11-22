<?php
use yii\helpers\Url;
?>
<hr>
<div class="article-wrapper">
    <a href="<?=Url::to(['/profile/article/view','id'=>$model->id])?>">
        <div class="article-header">
            <p><?= $model->name ?></p>

        </div></a>
    <p class="preview"> <img  width="90px" height="90px" src="/../../img/<?php
        if (!$model->preview == null){
            echo $model->preview;
        }
        ?>" alt="" />
        <?=$model->description?>
    </p>
</div>
