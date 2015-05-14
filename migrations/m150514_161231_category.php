<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m150514_161231_category
 */
class m150514_161231_category extends Migration
{
    /**
     * @return bool
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NULL',
            'status' => Schema::TYPE_INTEGER . ' DEFAULT 0',
            'timeCreate' => Schema::TYPE_BIGINT . ' NOT NULL'
        ]);

        $this->addColumn('post', 'categoryID', Schema::TYPE_INTEGER . ' NOT NULL');

        return true;
    }

    /**
     * @return bool
     */
    public function safeDown()
    {
        $this->dropTable('category');
        $this->dropColumn('post', 'categoryID');

        echo "m150514_161231_category reverted.\n";

        return true;
    }
}