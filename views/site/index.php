<?php

use app\modules\admin\models\Category;
use yii\helpers\Html;
use yii\widgets\ListView;

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
        <?php echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'index_golovna.php',
        ]);?>
    </div>
</div>

