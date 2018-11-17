<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property int $status
 */
class Category extends ActiveRecord
{
    const STATUS_ACTIVE = 10;


    public static function tableName()
    {
        return '{{%category}}';
    }

    public function getArticle(){
        return $this->hasMany(Category::className(),['id'=>'category_id']);
    }

    public function rules()
    {
        return [
            [[ 'name', 'status'], 'required'],
            [['id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Назва',
            'status' => 'Статус',
        ];
    }

    public static function getCategories()
    {
        return self::find()
            ->andWhere(['status' => self::STATUS_ACTIVE])
            ->all();
    }
}
