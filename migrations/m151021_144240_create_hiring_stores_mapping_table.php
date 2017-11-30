<?php

use yii\db\Schema;
use yii\db\Migration;

class m151021_144240_create_hiring_stores_mapping_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%hiring_stores_mapping}}', [
            'id' => Schema::TYPE_PK,
            'hiring_id' => Schema::TYPE_INTEGER . '(11) NULL DEFAULT NULL',
            'stores_id' => Schema::TYPE_INTEGER . '(11) NULL DEFAULT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%hiring_stores_mapping}}');
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
