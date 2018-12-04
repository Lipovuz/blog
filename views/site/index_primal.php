<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

if (!$model->slug==null)
    $article = $model->slug;
else
    $article = $model->name;

if (!$model->category->slug==null)
    $cat = $model->category->slug;
else
    $cat = $model->category->name;
?>

<hr>
<div class="article-wrapper">
    <a href="<?=Url::to(['/profile/article/view','id'=>$model->id,'article'=>$article,'cat'=>$cat])?>">
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
