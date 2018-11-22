<?php

namespace app\modules\admin\models;

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


    public static function getCategories()
    {
        return self::find()
            ->andWhere(['status' => self::STATUS_ACTIVE])
            ->all();
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    public function rules()
    {
        return [
            [[ 'name', 'status'], 'required'],
            [['id', 'status','parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['parent_id'],'parentValidate']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Назва',
            'parent_id' => 'Батьківська категорія',
            'status' => 'Статус',

        ];
    }


    public function parentValidate($attribute)
    {
        if ($this->isNewRecord) {
            return;
        }
        $existId = [$this->id];
        $categories =  Category::find()->select('id, parent_id')->indexBy('id')->asArray()->all();
        $currentParentId = $this->parent_id;
        if ($currentParentId == null) {
            return;
        }
        while (null != $currentParentId) {

            if (true === in_array($currentParentId, $existId)) {
                $this->addError($attribute, 'error message');
                return;
            }
            $existId[] = $currentParentId;
            $currentParentId = $categories[$currentParentId]['parent_id'];
        }
    }
}
