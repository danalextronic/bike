<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bike_event_activities_mapping".
 *
 * @property integer $id
 * @property integer $bike_event_id
 * @property integer $activity_id
 *
 * @property Activities $activity
 * @property BikeEvents $bikeEvent
 */
class BikeEventActivitiesMapping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bike_event_activities_mapping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bike_event_id', 'activity_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bike_event_id' => 'Bike Event ID',
            'activity_id' => 'Activity ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activities::className(), ['Activities_ID' => 'activity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeEvent()
    {
        return $this->hasOne(BikeEvents::className(), ['id' => 'bike_event_id']);
    }

    public static function saveEventsActivitiesMapping ($activities, $event) {
         foreach ($activities as $activity)
            {
                $BikeEventActivitiesMapping = new BikeEventActivitiesMapping();
                $BikeEventActivitiesMapping->bike_event_id = $event->id;
                $BikeEventActivitiesMapping->activity_id = $activity['activity_id'];
                $BikeEventActivitiesMapping->save();
            }
    }
}
