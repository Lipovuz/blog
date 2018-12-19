<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
?>
<div class="article-view view">
    <h1><?=$model->name?></h1>
        <?php if (!$model->preview == null)
            echo Html::img("@web/img/{$model->preview}", ['width' => 400, 'height' => 400]);
        ?>
    <br>
    <p><?=$model->text?></p>
</div>
