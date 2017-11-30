<?php

use yii\db\Schema;
use yii\db\Migration;

class m151030_152251_add_is_changed_column_to_bile_events_table extends Migration
{
    public function up()
    {
        $this->addColumn('bike_events', 'is_changed', Schema::TYPE_BOOLEAN.' DEFAULT "0"');
    }

    public function down()
    {
        $this->dropColumn('bike_events', 'is_changed');
    }
}
