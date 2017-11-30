<?php

use yii\db\Schema;
use yii\db\Migration;

class m151021_115328_add_is_archive_column_to_events_table extends Migration
{
    public function up()
    {
        $this->addColumn('bike_events', 'is_archive', Schema::TYPE_BOOLEAN.' NULL DEFAULT "0" AFTER `approved`');
    }

    public function down()
    {
        $this->dropColumn('bike_events', 'is_archive');
    }
}
