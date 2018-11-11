<?php

use app\modules\admin\models\Category;
use migrations\BaseMigration;
class m181106_103005_create_news_category extends BaseMigration
{
    public function safeUp()
    {
        $this->createTable(Category::tableName(), [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'status' => $this->boolean()->notNull(),
        ], $this->tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('category');
    }
}
