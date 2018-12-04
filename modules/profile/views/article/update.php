<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Редагувати статтю: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => Url::to(['index'])];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => Url::to(['view', 'id' => $model->id])];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
