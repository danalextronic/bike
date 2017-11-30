<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bike_event_vendors_mapping".
 *
 * @property integer $id
 * @property integer $bike_event_id
 * @property integer $vendor_id
 */
class BikeEventVendorsMapping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bike_event_vendors_mapping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bike_event_id', 'vendor_id'], 'safe']
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
            'vendor_id' => 'Vendor ID',
        ];
    }


    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['id' => 'vendor_id']);
    }

    public static function saveEventsVendorsMapping ($vendors, $event) {
         foreach ($vendors as $vendor)
            {
                $BikeEventVendorsMapping = new BikeEventVendorsMapping();
                $BikeEventVendorsMapping->bike_event_id = $event->id;
                $BikeEventVendorsMapping->vendor_id = $vendor['vendor_id'];
                $BikeEventVendorsMapping->save();
            }
    }
}
