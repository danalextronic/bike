<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_type".
 *
 * @property integer $Event_Type_ID
 * @property string $Event_Type
 * @property integer $Address_info
 */
class EventType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Address_info'], 'integer'],
            [['Event_Type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Event_Type_ID' => 'Event  Type  ID',
            'Event_Type' => 'Event  Type',
            'Address_info' => 'Address Info',
        ];
    }
}
