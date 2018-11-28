<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->meta_title;
$this->params['breadcrumbs'][] = ['label' => 'Статті', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="article-view view">
    <h1><?=$model->name?></h1>
        <img class="preview"  width="400px" height="400px" src="/../../img/<?php
        if (!$model->preview == null){
            echo $model->preview;
        }
        ?>" alt="" />
    <br><p><?=$model->text?></p>

</div>
