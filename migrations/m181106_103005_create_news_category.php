<?php

use migrations\BaseMigration;

class m181106_103005_create_news_category extends BaseMigration
{
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'parent_id'=> $this->integer(10)->defaultValue(null),
            'status' => $this->boolean()->notNull(),
        ], $this->tableOptions);

        $this->createIndex('FK_category_parent_id', '{{%category}}', 'parent_id');
        $this->addForeignKey(
            'FK_category_parent_id', '{{%category}}', 'parent_id', '{{%category}}', 'id', 'CASCADE', 'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
