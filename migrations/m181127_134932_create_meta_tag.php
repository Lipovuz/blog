<?php

use yii\db\Migration;

/**
 * Class m181127_134932_create_meta_tag
 */
class m181127_134932_create_meta_tag extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%category}}', 'meta_title', $this->string()->null());
        $this->addColumn('{{%category}}', 'meta_description', $this->string()->null());
        $this->addColumn('{{%category}}', 'meta_keywords', $this->string()->null());
        $this->addColumn('{{%article}}', 'meta_title', $this->string()->null());
        $this->addColumn('{{%article}}', 'meta_description', $this->string()->null());
        $this->addColumn('{{%article}}', 'meta_keywords', $this->string()->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%category}}', 'meta_title');
        $this->dropColumn('{{%category}}', 'meta_description');
        $this->dropColumn('{{%category}}', 'meta_keywords');
        $this->dropColumn('{{%article}}', 'meta_title');
        $this->dropColumn('{{%article}}', 'meta_description');
        $this->dropColumn('{{%article}}', 'meta_keywords');

    }

}
