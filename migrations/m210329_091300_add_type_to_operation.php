<?php

use yii\db\Migration;

/**
 * Class m210329_091300_add_type_to_operation
 */
class m210329_091300_add_type_to_operation extends Migration
{
    /**
     * @return void
     */
    public function safeUp():void
    {
        $this->addColumn('operation', 'type', $this->boolean()->notNull()->defaultValue(true));
    }

    /**
     * @return void
     */
    public function safeDown():void
    {
        $this->dropColumn('operation', 'type');
    }
}
