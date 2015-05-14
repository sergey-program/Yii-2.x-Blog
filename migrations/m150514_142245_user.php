<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m150514_142245_user
 */
class m150514_142245_user extends Migration
{
    /**
     * @return bool
     */
    private function checkAuthManagerTables()
    {
        $oDB = \Yii::$app->getDb();
        $oAuthManager = \Yii::$app->getAuthManager();

        $bTableSchema = (
            $oDB->getTableSchema($oAuthManager->itemTable, true) &&
            $oDB->getTableSchema($oAuthManager->itemChildTable, true) &&
            $oDB->getTableSchema($oAuthManager->assignmentTable, true) &&
            $oDB->getTableSchema($oAuthManager->ruleTable, true)
        );

        return $bTableSchema;
    }

    /**
     * @return bool
     */
    public function safeUp()
    {
        if (!$this->checkAuthManagerTables()) {
            echo "You must execute 'php yii migrate/up --migrationPath=@yii/rbac/migrations' first.\n";

            return false;
        }

        $this->createTable('user', [
            'id' => 'pk',
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'timeCreate' => Schema::TYPE_BIGINT . ' NOT NULL',
            'authKey' => Schema::TYPE_STRING . ' NOT NULL',
            'isConfirmed' => Schema::TYPE_BOOLEAN . ' NULL'
        ]);

        return true;
    }

    /**
     * @return bool
     */
    public function safeDown()
    {
        $this->dropTable('user');

        echo "m150514_142245_user reverted.\n";

        return true;
    }
}
