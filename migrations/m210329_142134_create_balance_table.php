<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%balance}}`.
 */
class m210329_142134_create_balance_table extends Migration
{
    /**
     * @return void
     */
    public function safeUp():void
    {
        $this->createTable('{{%balance}}', [
            'id' => $this->primaryKey(),
            'amount' => $this->float(),
            'user_id' => $this->integer(),
        ]);
        $this->addForeignKey(
            'balance_user_id',
            'balance',
            'user_id',
            'user',
            'id',
        );
    }

    /**
     * @return void
     */
    public function safeDown():void
    {
        $this->dropTable('{{%balance}}');
    }
}
