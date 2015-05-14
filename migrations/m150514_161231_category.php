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
    public function up()
    {
        $this->createTable('category', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NULL',
            'status' => Schema::TYPE_INTEGER . ' NOT NULL',
            'timeCreate' => Schema::TYPE_BIGINT . ' NOT NULL'
        ]);

        return true;
    }

    /**
     * @return bool
     */
    public function down()
    {
        $this->dropTable('category');

        echo "m150514_161231_category reverted.\n";

        return true;
    }
}