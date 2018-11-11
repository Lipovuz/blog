<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<section>
    <div class="col-sm-5 ">

        <div class="view-product">
            <?php /*if (($model->img)): */?>
            <img width="200px" height="200px" src="/../../img/<?php
                if (!$model->img == null){
                    echo $model->img;
                }else{
                    echo 'no-image.png';
                }
            ?>" alt="" />

        </div>
    </div>

    <div class="product-information">
        <br>
        <h2><?=$model->name?></h2>

        <br>
        <p><b>Nickname:</b><?=$model->username?></p>
        <p><b>E-mail:</b><?=$model->email?></p>
        <p><b>Телефон:</b><?=$model->tel?></p>
    </div>
    <div class="article-index">
        <br>

         <p>
             <?= Html::a('Редагувати профіль', ['/admin/user/update','id'=>Yii::$app->user->id], ['class' => 'btn btn-success']) ?>

             <?= Html::a('Додати статю', ['create'], ['class' => 'btn btn-success']) ?>
         </p>
        <h1>Мої статті</h1>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                'description',
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
</section>
</html>