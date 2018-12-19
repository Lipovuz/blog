<?php

use yii\widgets\ListView;
use app\widgets\MenuWidget;

/**
 * @var \app\models\Article[] $articles
 */

$this->title = 'Головна';
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
            <div class="text-center">
                <h1>Hello Blog!!!</h1>
            </div>
        </div>

    </div>

</div>

