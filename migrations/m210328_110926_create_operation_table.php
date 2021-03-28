<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%operation}}`.
 */
class m210328_110926_create_operation_table extends Migration
{
    /**
     * @return void
     */
    public function safeUp():void
    {
        $this->createTable('{{%operation}}', [
            'id' => $this->primaryKey(),
            'amount' => $this->float(),
            'created_at' => $this->dateTime(),
            'user_id' => $this->integer(),
            'category_id' => $this->integer(),
        ]);
        $this->addForeignKey(
            'operation_user_id',
            'operation',
            'user_id',
            'user',
            'id',
        );
        $this->addForeignKey(
            'operation_category_id',
            'operation',
            'category_id',
            'category',
            'id'
        );
    }

    /**
     * @return void
     */
    public function safeDown():void
    {
        $this->dropTable('{{%operation}}');
    }
}
