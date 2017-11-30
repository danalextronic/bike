<?php

use yii\db\Schema;
use yii\db\Migration;

class m151026_153018_create_vendor_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%vendor}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(255) NULL DEFAULT NULL',
            'description' => Schema::TYPE_TEXT . ' NULL DEFAULT NULL',
            'image_url' => Schema::TYPE_STRING . '(255) NULL DEFAULT NULL',

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%vendor}}');

        return false;
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
