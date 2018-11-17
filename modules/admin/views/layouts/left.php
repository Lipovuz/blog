<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/../../img/<?php
                if (!Yii::$app->user->identity->img == null){
                    echo Yii::$app->user->identity->img;
                }else{
                    echo 'no-image.png';
                }
                ?>" alt="" />
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu admin', 'options' => ['class' => 'header']],
                    ['label' => 'Головна', 'icon' => ' fa-database', 'url' => ['/site/index']],
                    ['label' => 'Профіль', 'icon' => ' fa-user', 'url' => ['/profile']],
                    ['label' => 'Категорії', 'icon' => ' fa-list-alt', 'url' => ['/admin/category/index']],
                    ['label' => 'Статті', 'icon' => ' fa-file-text', 'url' => ['/profile/article/index']],
                    ['label' => 'Користувачі', 'icon' => ' fa-users','url' => ['/admin/user/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
