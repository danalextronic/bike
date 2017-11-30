<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "store_bike_events".
 *
 * @property integer $id
 * @property integer $store_id
 * @property integer $bike_events_id
 *
 * @property Store $store
 * @property BikeEvents $bikeEvents
 */
class StoreBikeEvents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_bike_events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_id', 'bike_events_id'], 'required'],
            [['store_id', 'bike_events_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'store_id' => 'Store ID',
            'bike_events_id' => 'Bike Events ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['Store_ID' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeEvents()
    {
        return $this->hasOne(BikeEvents::className(), ['id' => 'bike_events_id']);
    }
}
