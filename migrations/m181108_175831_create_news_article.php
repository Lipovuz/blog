<?php

use migrations\BaseMigration;
use app\models\Article;
use app\modules\admin\models\Category;
use app\models\User;

class m181108_175831_create_news_article extends BaseMigration
{
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'status' => $this->boolean()->notNull(),
        ], $this->tableOptions);

        $this->createIndex('FK_article_category_id', '{{%article}}', 'category_id');
        $this->addForeignKey(
            'FK_article_category_id', '{{%article}}', 'category_id', '{{%category}}', 'id', 'CASCADE', 'RESTRICT'
        );

        $this->createIndex('FK_article_user_id', '{{%article}}', 'user_id');
        $this->addForeignKey(
            'FK_article_user_id', '{{%article}}', 'user_id', '{{%users}}', 'id', 'CASCADE', 'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
