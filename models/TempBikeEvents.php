<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp_bike_events".
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
 * @property integer $deals_Id
 *
 * @property EventType $eventType
 * @property FoodRefreshments $foodRefreshments
 * @property JoinUs $joinUs
 * @property GiveAway $giveAway
 * @property InStoreDeal $inStoreDeal
 * @property Deals $deals
 */
class TempBikeEvents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_bike_events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date', 'eventTime'], 'safe'],
            [['eventTypeId', 'join_us_id', 'food_refreshments_id', 'give_away_id', 'in_store_deal_id', 'deals_Id'], 'integer'],
            [['vendor_1_details', 'vendor_2_details', 'vendor_3_details', 'vendor_4_details', 'vendor_5_details', 'vendor_6_details', 'vendor_7_details', 'vendor_8_details', 'vendor_9_details', 'vendor_10_details'], 'string'],
            [['event_template_titles', 'vendor_1', 'vendor_2', 'vendor_3', 'vendor_4', 'vendor_5', 'vendor_6', 'vendor_7', 'vendor_8', 'vendor_9', 'vendor_10'], 'string', 'max' => 255],
            [['vendor_1_image', 'vendor_2_image', 'vendor_3_image', 'vendor_4_image', 'vendor_5_image', 'vendor_6_image', 'vendor_7_image', 'vendor_8_image', 'vendor_9_image', 'vendor_10_image'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_template_titles' => 'Event Template Titles',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'eventTime' => 'Event Time',
            'eventTypeId' => 'Event Type',
            'join_us_id' => 'Join Us',
            'food_refreshments_id' => 'Food Refreshments',
            'give_away_id' => 'Give Away',
            'in_store_deal_id' => 'In Store Deal',
            'deals_Id' => 'Deals',
            'vendor_1' => 'Vendor 1',
            'vendor_1_details' => 'Vendor 1 Details',
            'vendor_1_image' => 'Vendor 1 Image',
            'vendor_2' => 'Vendor 2',
            'vendor_2_details' => 'Vendor 2 Details',
            'vendor_2_image' => 'Vendor 2 Image',
            'vendor_3' => 'Vendor 3',
            'vendor_3_details' => 'Vendor 3 Details',
            'vendor_3_image' => 'Vendor 3 Image',
            'vendor_4' => 'Vendor 4',
            'vendor_4_details' => 'Vendor 4 Details',
            'vendor_4_image' => 'Vendor 4 Image',
            'vendor_5' => 'Vendor 5',
            'vendor_5_details' => 'Vendor 5 Details',
            'vendor_5_image' => 'Vendor 5 Image',
            'vendor_6' => 'Vendor 6',
            'vendor_6_details' => 'Vendor 6 Details',
            'vendor_6_image' => 'Vendor 6 Image',
            'vendor_7' => 'Vendor 7',
            'vendor_7_details' => 'Vendor 7 Details',
            'vendor_7_image' => 'Vendor 7 Image',
            'vendor_8' => 'Vendor 8',
            'vendor_8_details' => 'Vendor 8 Details',
            'vendor_8_image' => 'Vendor 8 Image',
            'vendor_9' => 'Vendor 9',
            'vendor_9_details' => 'Vendor 9 Details',
            'vendor_9_image' => 'Vendor 9 Image',
            'vendor_10' => 'Vendor 10',
            'vendor_10_details' => 'Vendor 10 Details',
            'vendor_10_image' => 'Vendor 10 Image',
        ];
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
        return $this->hasOne(JoinUs::className(), ['Join_US_ID' => 'join_us_id']);
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
        return $this->hasOne(Deals::className(), ['Deals_ID' => 'deals_Id']);
    }
}
