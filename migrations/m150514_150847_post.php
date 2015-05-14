<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m150514_150847_post
 */
class m150514_150847_post extends Migration
{
    /**
     * @return bool
     */
    public function safeUp()
    {
        $this->createTable('post', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'contentFull' => Schema::TYPE_TEXT . ' NOT NULL',
            'contentShort' => Schema::TYPE_TEXT . ' NOT NULL',
            'timeCreate' => Schema::TYPE_BIGINT . ' NOT NULL',
        ]);

        $this->createTable('post_image', [
            'id' => 'pk',
            'postID' => Schema::TYPE_INTEGER . ' NOT NULL',
            'fileName' => Schema::TYPE_STRING . ' NOT NULL',
            'isPrimary' => Schema::TYPE_BOOLEAN . ' NOT NULL'
        ]);

        $this->createTable('post_category', [
            'id' => 'pk',
            'postID' => Schema::TYPE_INTEGER . ' NOT NULL',
            'categoryID' => Schema::TYPE_INTEGER . ' NOT NULL'
        ]);

        return true;
    }

    /**
     * @return bool
     */
    public function safeDown()
    {
        $this->dropTable('post');
        $this->dropTable('post_image');
        $this->dropTable('post_category');

        echo "m150514_150847_post reverted.\n";

        return true;
    }
}
