<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210328_100937_create_user_table extends Migration
{
    /**
     * @return void
     */
    public function safeUp():void
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(55)->notNull(),
            'password' => $this->string(255)->notNull(),
            'auth_key' => $this->string(255)->notNull(),
            'access_token' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @return void
     */
    public function safeDown():void
    {
        $this->dropTable('{{%user}}');
    }
}
