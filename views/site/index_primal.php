<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
?>

<hr>
<div class="article-wrapper">
    <a href="<?=Url::to(['/profile/article/view', 'article_slug'=>$model->slug,'category_slug'=>$model->category->slug])?>">
        <div class="article-header">
            <p><?= $model->name ?></p>

        </div>
    </a>
    <p class="preview">
       <?php
        if (!$model->preview == null){
            echo Html::img("@web/img/{$model->preview}",['width'=>90, 'height'=>90]) ;
        }
        ?>
        <?=$model->description?>
    </p>
</div>
