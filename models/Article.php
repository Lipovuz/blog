<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\modules\admin\models\Category;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $name
 * @property string $text
 * @property string $img
 * @property int $status
 */

class Article extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%article}}';
    }

    public function getCategory(){
        return $this->hasMany(Category::className(),['category_id'=>'id']);
    }

    public function getUser(){
        return $this->hasOne(User::className(),['user_id'=>'id']);
    }

    public function rules()
    {
        return [
            [['status'],'default','value'=>User::STATUS_WORKED],
            [[ 'category_id',  'name', 'text', 'status'], 'required'],
            [['id', 'category_id', 'user_id', 'status'], 'integer'],
            [['text','description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категорія',
            'user_id' => 'User ID',
            'name' => 'Назва',
            'description' => 'Опис',
            'text' => 'Стаття',
            'status' => 'Статус',
        ];
    }
}
