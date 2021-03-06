<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Редагування користувача: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Користувачі', 'url' => Url::to(['index'])];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => Url::to(['view', 'id' => $model->id])];
$this->params['breadcrumbs'][] = 'Редагувати';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>