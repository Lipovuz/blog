<?php

use yii\widgets\ListView;
use app\components\MenuWidget;

/**
 * @var \app\models\Article[] $articles
 */

$this->title = 'Головна';
$this->registerMetaTag(['name' => 'description', 'content' => 'Блог статей']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'yii']);
?>
<div class="site-index container">
    <div class="row">
        <div class="">
            <h2>Категорії</h2>
            <div>
            <ul id="menu-dashboard" class="col-md-2 menu catalog nav nav-pills nav-stacked">
                <li><?=MenuWidget::widget(['tpl'=>'menu']) ?></li>
            </ul>
            </div>
            <div>
                <?php echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => 'index_primal.php',
                ]);?>
            </div>
        </div>

    </div>

</div>

