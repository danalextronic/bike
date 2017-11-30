<?php

use yii\db\Schema;
use yii\db\Migration;

class m151026_152712_bike_event_vendors_mapping extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%bike_event_vendors_mapping}}', [
            'id' => Schema::TYPE_PK,
            'bike_event_id' => Schema::TYPE_INTEGER . '(11) NULL DEFAULT NULL',
            'vendor_id' => Schema::TYPE_INTEGER . '(11) NULL DEFAULT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%bike_event_vendors_mapping}}');

        return false;
    }

}
