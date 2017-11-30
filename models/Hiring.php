<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hiring".
 *
 * @property integer $id
 * @property integer $bike_events_id
 * @property string $date
 *
 * @property HiringStoresMapping[] $hiringStoresMappings
 */
class Hiring extends \yii\db\ActiveRecord
{
    public $StoreIds;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hiring';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bike_events_id'], 'integer'],
            [['date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bike_events_id' => 'Bike Events ID',
            'date' => 'Date',
            'StoreIds' => 'Store',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHiringStoresMappings()
    {
        return $this->hasMany(HiringStoresMapping::className(), ['hiring_id' => 'id']);
    }
}
