<?php

use yii\db\Migration;

/**
 * Class m210329_130803_change_datetime_to_date_field_in_operations
 */
class m210329_130803_change_datetime_to_date_field_in_operations extends Migration
{
    /**
     * @return void
     */
    public function safeUp():void
    {
        $this->alterColumn('operation', 'created_at', 'date');
    }

    /**
     * @return void
     */
    public function safeDown():void
    {
        $this->alterColumn('operation', 'created_at', 'datetime');
    }
}
