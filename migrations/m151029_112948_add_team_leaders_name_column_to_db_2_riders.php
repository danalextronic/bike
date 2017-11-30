<?php

use yii\db\Schema;
use yii\db\Migration;

class m151029_112948_add_team_leaders_name_column_to_db_2_riders extends Migration
{
    public function up()
    {
        $this->addColumn('db_2_riders', 'Team_Leaders_Name', Schema::TYPE_STRING.'(255) NULL DEFAULT NULL');
    }

    public function down()
    {
        $this->dropColumn('db_2_riders', 'Team_Leaders_Name');
    }
}
