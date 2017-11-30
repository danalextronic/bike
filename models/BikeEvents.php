<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bike_events".
 *
 * @property integer $id
 * @property string $event_template_titles
 * @property string $start_date
 * @property string $end_date
 * @property string $eventTime
 * @property integer $eventTypeId
 * @property integer $join_us_id
 * @property integer $food_refreshments_id
 * @property integer $give_away_id
 * @property integer $in_store_deal_id
 * @property integer $deals_id
 * @property integer $is_archive
 * @property integer $approved
 * @property integer $is_changed
 * @property EventType $eventType
 * @property FoodRefreshments $foodRefreshments
 * @property JoinUs $joinUs
 * @property GiveAway $giveAway
 * @property InStoreDeal $inStoreDeal
 * @property Deals $deals
 * @property Activities $activities1
 * @property StoreBikeEvents[] $storeBikeEvents
 */
class BikeEvents extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bike_events';
    }

    public $StoreIds;
    public $event_start_time;
    public $event_end_time;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date', 'eventTime', 'event_start_time', 'event_end_time','is_archive','StoreIds', 'approved', 'is_changed'], 'safe'],
            [['eventTypeId', 'join_us_id', 'food_refreshments_id', 'give_away_id', 'in_store_deal_id', 'deals_id', 'is_archive', 'approved', 'is_changed'], 'integer'],
            [['event_template_titles'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'StoreIds' =>'Store',
            'event_template_titles' => 'Event Name',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'eventTime' => 'Event Time',
            'event_start_time' => 'Start Time',
            'event_end_time' => 'End Time',
            'eventTypeId' => 'Event Type',
            'join_us_id' => 'Join Us',
            'food_refreshments_id' => 'Food Refreshments',
            'give_away_id' => 'Give Away',
            'in_store_deal_id' => 'In Store Deal',
            'deals_id' => 'Deals',
            'is_archive' => 'Archive',
            'approved' => 'Approved',
            'is_changed' => 'Changed',
        ];
    }

    public function getStoresAsString() {
        $output = [];
        foreach ($this->stores as $store) {
            $output[] = $store->Store_Name;
        }
        return implode(" | ",$output);
    }

    public function getVendorsAsString() {
        $output = [];
        foreach ($this->vendors as $vendor) {
            $output[] = $vendor->name;
        }
        return implode(" | ",$output);
    }

    public function getActivitiesAsString() {
        $output = [];
        foreach ($this->activities as $activity) {
            $output[] =  $activity->Activities;
        }
        return implode(" | ", $output);
    }

    public function full_event_time() {
        return !empty($this->event_start_time) && !empty($this->event_end_time) ? $this->event_start_time . " - ". $this->event_end_time : "";
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventType()
    {
        return $this->hasOne(EventType::className(), ['Event_Type_ID' => 'eventTypeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoodRefreshments()
    {
        return $this->hasOne(FoodRefreshments::className(), ['Food_Refreshments_ID' => 'food_refreshments_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJoinUs()
    {
        return $this->hasOne(Joinus::className(), ['Join_US_ID' => 'join_us_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGiveAway()
    {
        return $this->hasOne(GiveAway::className(), ['Give_Away_ID' => 'give_away_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInStoreDeal()
    {
        return $this->hasOne(InStoreDeal::className(), ['In_Store_Deal_ID' => 'in_store_deal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeals()
    {
        return $this->hasOne(Deals::className(), ['Deals_ID' => 'deals_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStoreBikeEvents()
    {
        return $this->hasMany(StoreBikeEvents::className(), ['bike_events_id' => 'id']);
    }

    public function getStores() {
        return $this->hasMany(Store::className(), ['Store_ID' => 'store_id'])
            ->viaTable('store_bike_events', ['bike_events_id' => 'id']);
    }

    public function getVendors() {
        return $this->hasMany(Vendor::className(), ['id' => 'vendor_id'])
            ->viaTable('bike_event_vendors_mapping', ['bike_event_id' => 'id']);
    }

    public function getActivities() {
            return $this->hasMany(Activities::className(), ['Activities_ID' => 'activity_id'])
                ->viaTable('bike_event_activities_mapping', [   'bike_event_id' => 'id']);
    }

    public function beforeSave($insert) {
        $this->eventTime = $this->full_event_time();
        return parent::beforeSave($insert);
    }

    public function afterFind() {
        $parse_time = explode("-", $this->eventTime);
        $this->event_start_time = isset($parse_time[0]) ? trim($parse_time[0]) : '';
        $this->event_end_time = isset($parse_time[1]) ? trim($parse_time[1]) : '';
    }
}
