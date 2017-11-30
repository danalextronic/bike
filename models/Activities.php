<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activities".
 *
 * @property integer $Activities_ID
 * @property string $Activities
 * @property string $Activities_Image
 * @property string $Hyperlink
 *
 * @property BikeNightTemplate[] $bikeNightTemplates
 * @property BikeNightTemplate[] $bikeNightTemplates0
 * @property BikeNightTemplate[] $bikeNightTemplates1
 * @property BikeNightTemplate[] $bikeNightTemplates2
 */
class Activities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Activities', 'Activities_Image', 'Hyperlink'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Activities_ID' => 'Activities ID',
            'Activities' => 'Activities',
            'Activities_Image' => 'Activities Image',
            'Hyperlink' => 'Hyperlink',
        ];
    }


    public static function updateActivityData($activities) {

        foreach ($activities as $a)
        {
           $activity = Activities::findOne($a['activity_id']);
           $activity->Activities = $a['activity_name'];
           $activity->Activities_Image = $a['activity_image'];
           $activity->Hyperlink = $a['activity_hyperlink'];

           $activity->save();
        }
    }
}
