<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Article;
use app\models\User;
use app\modules\admin\models\Category;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */

class CreateArticleController extends Controller
{

    public function actionIndex()
    {
        for ($i=0; $i < 200; $i++) {
            $faker = \Faker\Factory::create('es_RU');
            $article = new Article();
            $category_id = rand(1,count(Category::find()->all()));
            $user_id = rand(1,count(User::find()->all()));

            $article -> category_id = $category_id;
            $article -> user_id = $user_id;
            $article -> name = $faker->city;
            $article -> description = $faker->city;
            $article -> text = $faker->text;
            $article -> preview = null;
            $article -> status = 10;

            $article->save();
        }
    }


}
