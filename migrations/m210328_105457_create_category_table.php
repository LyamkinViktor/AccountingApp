<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m210328_105457_create_category_table extends Migration
{
    /**
     * @return void
     */
    public function safeUp():void
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);
    }

    /**
     * @return void
     */
    public function safeDown():void
    {
        $this->dropTable('{{%category}}');
    }
}
