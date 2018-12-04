<?php

use yii\db\Migration;

/**
 * Class m181123_155100_update_category_and_article
 */
class m181123_155100_update_category_and_article extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%category}}', 'parent_id', $this->integer(10)->defaultValue(null));
        $this->addColumn('{{%article}}', 'preview', $this->string(255)->null());
        $this->createIndex('FK_category_parent_id', '{{%category}}', 'parent_id');
        $this->addForeignKey(
            'FK_category_parent_id', '{{%category}}', 'parent_id', '{{%category}}', 'id', 'CASCADE', 'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_category_parent_id', '{{%category}}');
        $this->dropIndex('FK_category_parent_id', '{{%category}}');
        $this->dropColumn('{{%category}}', 'parent_id');
        $this->dropColumn('{{%article}}', 'preview');
    }

}
