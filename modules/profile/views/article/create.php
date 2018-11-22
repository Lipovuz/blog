<head><meta charset="windows-1251"></head>
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Створити статтю';
$this->registerMetaTag(['name' => 'description', 'content' => 'Створення статті']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'yii']);
$this->params['breadcrumbs'][] = ['label' => 'Статті', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
