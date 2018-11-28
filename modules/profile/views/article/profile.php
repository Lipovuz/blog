<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

$this->title='Профіль|'.$model->name;?>


<div class="view-product col-sm-7">
    <img  width="200px" height="200px" src="/../../img/<?php
        if (!$model->img == null){
            echo $model->img;
        }else{
            echo 'no-image.png';
        }
    ?>" alt="" />

</div>

<div class="product-information">

    <h2><?=$model->name?></h2>

    <br>
    <p><b>Nickname:</b><?=$model->username?></p>
    <p><b>E-mail:</b><?=$model->email?></p>
    <p><b>Телефон:</b><?=$model->tel?></p>
    <?= Html::a('Редагувати профіль', ['/admin/user/update','id'=>Yii::$app->user->id], ['class' => 'btn btn-success']) ?>
</div>

<div class="article-index">
    <br>
    <h1>Мої статті</h1>
    <p>
    <?= Html::a('Додати статтю', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'description',
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category->name;
                },
            ],
            [
                'attribute' => 'status',
                'value' => function($data){
                    return User::getStatuses()[$data->status];
                },
                'format' => 'html',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
