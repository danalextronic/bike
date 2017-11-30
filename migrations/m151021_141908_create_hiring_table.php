<?php

use yii\db\Schema;
use yii\db\Migration;

class m151021_141908_create_hiring_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%hiring}}', [
            'id' => Schema::TYPE_PK,
            'bike_events_id' => Schema::TYPE_INTEGER . '(11) NULL DEFAULT NULL',
            'date' => Schema::TYPE_DATE . ' NULL DEFAULT NULL',
            'position_1' => Schema::TYPE_SMALLINT . ' NULL DEFAULT NULL',
            'position_1_link' => Schema::TYPE_STRING . '(255) NULL DEFAULT NULL',
            'position_2' => Schema::TYPE_SMALLINT . ' NULL DEFAULT NULL',
            'position_2_link' => Schema::TYPE_STRING . '(255) NULL DEFAULT NULL',
            'position_3' => Schema::TYPE_SMALLINT . ' NULL DEFAULT NULL',
            'position_3_link' => Schema::TYPE_STRING . '(255) NULL DEFAULT NULL',
            'position_4' => Schema::TYPE_SMALLINT . ' NULL DEFAULT NULL',
            'position_4_link' => Schema::TYPE_STRING . '(255) NULL DEFAULT NULL',
            'position_5' => Schema::TYPE_SMALLINT . ' NULL DEFAULT NULL',
            'position_5_link' => Schema::TYPE_STRING . '(255) NULL DEFAULT NULL',
            'position_6' => Schema::TYPE_SMALLINT . ' NULL DEFAULT NULL',
            'position_6_link' => Schema::TYPE_STRING . '(255) NULL DEFAULT NULL',

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%hiring}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
