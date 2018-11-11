<?php

use app\modules\admin\models\Category;
use yii\helpers\Html;

/**
 * @var \app\models\Article[] $articles
 */

$this->title = 'Головна';
?>
<div class="site-index container">
    <div class="row">
        <div id="" class="col-md-2 menu">
            <h2>Категорії</h2>
            <ul id="menu-dashboard" class="nav nav-pills nav-stacked">
                <?php foreach (Category::getCategories() as $category) : ?>
                    <li class="<?= Yii::$app->request->get('category') == $category->id ? 'active' : '' ?>">
                        <?= Html::a($category->name, ['/site/index', 'category' => $category->id]) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php foreach ($articles as $article ):?>
            <div class="">
                <div class="article-wrapper">
                    <a href="<?=\yii\helpers\Url::to(['/profile/article/view','id'=>$article[id]])?>">
                        <div class="article-header">
                        <p><?= $article[name] ?></p>
                    </div></a>
                    <div class="article-body">
                            <?=$article[description]?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="menu-pagin">
        <?php echo \yii\widgets\LinkPager::widget([
            'pagination' => $pages,

        ]);?>
    </div>
</div>

