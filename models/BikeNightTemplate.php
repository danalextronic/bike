<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bike_night_template".
 *
 * @property integer $Bike_Night_ID
 * @property integer $Store_ID
 * @property string $Date
 * @property string $Time
 * @property string $Vendor_1
 * @property string $Vendor_2
 * @property string $Vendor_3
 * @property string $Vendor_4
 * @property string $Vendor_5
 * @property string $Vendor_6
 * @property string $Vendor_7
 * @property string $Vendor_8
 * @property string $Vendor_9
 * @property string $Vendor_10
 * @property string $Vendor_11
 * @property string $Vendor_12
 * @property string $Vendor_13
 * @property string $Vendor_14
 * @property string $Vendor_15
 * @property string $Vendor_16
 * @property string $Vendor_17
 * @property string $Vendor_18
 * @property string $Vendor_19
 * @property string $Vendor_20
 * @property string $Combine
 * @property integer $Winter_Gear_Night
 * @property string $Combine_Pre
 * @property integer $Skip
 * @property integer $Cancelled
 * @property integer $Deals_ID
 * @property integer $Give_Away_ID
 * @property integer $In_Store_Deal_ID
 * @property integer $Vendor_Images_1
 * @property integer $Vendor_Images_2
 * @property integer $Vendor_Images_3
 * @property integer $Vendor_Images_4
 * @property integer $Vendor_Images_5
 * @property integer $Vendor_Images_6
 * @property integer $Vendor_Images_7
 * @property integer $Vendor_Images_8
 * @property integer $Vendor_Images_9
 * @property integer $Vendor_Images_10
 * @property integer $Join_US_ID
 * @property integer $Rim_Strip_Toss
 * @property integer $Helmet_Toss
 * @property integer $Activities_1
 * @property integer $Activities_2
 * @property integer $Activities_3
 * @property integer $Activities_4
 * @property integer $Food_Refreshments
 * @property integer $Now_Hiring
 * @property string $Activities_URL
 * @property string $Reschedule_Date_If_Cancelled
 * @property string $Activities3_URL
 * @property integer $Special_Event
 * @property string $End_Date
 * @property integer $Event_Type_ID
 *
 * @property Store $store
 * @property VendorImages $vendorImages7
 * @property VendorImages $vendorImages8
 * @property VendorImages $vendorImages9
 * @property VendorImages $vendorImages10
 * @property JoinUs $joinUS
 * @property Activities $activities1
 * @property Activities $activities2
 * @property Activities $activities3
 * @property Activities $activities4
 * @property Deals $deals
 * @property GiveAway $giveAway
 * @property VendorImages $vendorImages1
 * @property VendorImages $vendorImages2
 * @property VendorImages $vendorImages3
 * @property VendorImages $vendorImages4
 * @property VendorImages $vendorImages5
 * @property VendorImages $vendorImages6
 */
class BikeNightTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bike_night_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Store_ID', 'Winter_Gear_Night', 'Skip', 'Cancelled', 'Deals_ID', 'Give_Away_ID', 'In_Store_Deal_ID', 'Vendor_Images_1', 'Vendor_Images_2', 'Vendor_Images_3', 'Vendor_Images_4', 'Vendor_Images_5', 'Vendor_Images_6', 'Vendor_Images_7', 'Vendor_Images_8', 'Vendor_Images_9', 'Vendor_Images_10', 'Join_US_ID', 'Rim_Strip_Toss', 'Helmet_Toss', 'Activities_1', 'Activities_2', 'Activities_3', 'Activities_4', 'Food_Refreshments', 'Now_Hiring', 'Special_Event', 'Event_Type_ID'], 'integer'],
            [['Date', 'Reschedule_Date_If_Cancelled', 'End_Date'], 'safe'],
            [['Time', 'Vendor_1', 'Vendor_2', 'Vendor_3', 'Vendor_4', 'Vendor_5', 'Vendor_6', 'Vendor_7', 'Vendor_8', 'Vendor_9', 'Vendor_10', 'Vendor_11', 'Vendor_12', 'Vendor_13', 'Vendor_14', 'Vendor_15', 'Vendor_16', 'Vendor_17', 'Vendor_18', 'Vendor_19', 'Vendor_20', 'Combine', 'Combine_Pre', 'Activities_URL', 'Activities3_URL'], 'string', 'max' => 255],
            [['Combine'], 'unique'],
            ['Time', 'default', 'value' => "5-8 pm"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Bike_Night_ID' => 'Bike Night',
            'Store_ID' => 'Store',
            'Date' => 'Date',
            'Time' => 'Time',
            'Vendor_1' => 'Vendor 1',
            'Vendor_2' => 'Vendor_1 Details',
            'Vendor_3' => 'Vendor 2',
            'Vendor_4' => 'Vendor_2 Details',
            'Vendor_5' => 'Vendor 3',
            'Vendor_6' => 'Vendor_3 Details',
            'Vendor_7' => 'Vendor 4',
            'Vendor_8' => 'Vendor_4 Details',
            'Vendor_9' => 'Vendor 5',
            'Vendor_10' => 'Vendor_5 Details',
            'Vendor_11' => 'Vendor 6',
            'Vendor_12' => 'Vendor_6 Details',
            'Vendor_13' => 'Vendor 7',
            'Vendor_14' => 'Vendor_7 Details',
            'Vendor_15' => 'Vendor 8',
            'Vendor_16' => 'Vendor_8 Details',
            'Vendor_17' => 'Vendor 9',
            'Vendor_18' => 'Vendor_9 Details',
            'Vendor_19' => 'Vendor 10',
            'Vendor_20' => 'Vendor_10 Details',
            'Combine' => 'Combine',
            'Winter_Gear_Night' => 'Winter  Gear  Night',
            'Combine_Pre' => 'Combine Pre',
            'Skip' => 'Skip Remaining Emails',
            'Cancelled' => 'Reschedule',
            'Deals_ID' => 'Deals',
            'Give_Away_ID' => 'Give Away',
            'In_Store_Deal_ID' => 'In Store Deal',
            'Vendor_Images_1' => 'Images',
            'Vendor_Images_2' => 'Images',
            'Vendor_Images_3' => 'Images',
            'Vendor_Images_4' => 'Images',
            'Vendor_Images_5' => 'Images',
            'Vendor_Images_6' => 'Images',
            'Vendor_Images_7' => 'Images',
            'Vendor_Images_8' => 'Images',
            'Vendor_Images_9' => 'Images',
            'Vendor_Images_10' => 'Images',
            'Join_US_ID' => 'Join Us',
            'Rim_Strip_Toss' => 'Rim Strip Toss',
            'Helmet_Toss' => 'Helmet  Toss',
            'Activities_1' => 'Activities 1',
            'Activities_2' => 'Activities 2',
            'Activities_3' => 'Activities 3',
            'Activities_4' => 'Activities 4',
            'Food_Refreshments' => 'Food  Refreshments',
            'Now_Hiring' => 'Now  Hiring',
            'Activities_URL' => 'Url',
            'Reschedule_Date_If_Cancelled' => 'Reschedule  Date  If  Cancelled',
            'Activities3_URL' => 'Url',
            'Special_Event' => 'Special Event',
            'End_Date' => 'End  Date',
            'Event_Type_ID' => 'Event Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['Store_ID' => 'Store_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorImages7()
    {
        return $this->hasOne(VendorImages::className(), ['Vendor_1_Image_ID' => 'Vendor_Images_7']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorImages8()
    {
        return $this->hasOne(VendorImages::className(), ['Vendor_1_Image_ID' => 'Vendor_Images_8']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorImages9()
    {
        return $this->hasOne(VendorImages::className(), ['Vendor_1_Image_ID' => 'Vendor_Images_9']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorImages10()
    {
        return $this->hasOne(VendorImages::className(), ['Vendor_1_Image_ID' => 'Vendor_Images_10']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJoinUS()
    {
        return $this->hasOne(JoinUs::className(), ['Join_US_ID' => 'Join_US_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities1()
    {
        return $this->hasOne(Activities::className(), ['Activities_ID' => 'Activities_1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities2()
    {
        return $this->hasOne(Activities::className(), ['Activities_ID' => 'Activities_2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities3()
    {
        return $this->hasOne(Activities::className(), ['Activities_ID' => 'Activities_3']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities4()
    {
        return $this->hasOne(Activities::className(), ['Activities_ID' => 'Activities_4']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeals()
    {
        return $this->hasOne(Deals::className(), ['Deals_ID' => 'Deals_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGiveAway()
    {
        return $this->hasOne(GiveAway::className(), ['Give_Away_ID' => 'Give_Away_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorImages1()
    {
        return $this->hasOne(VendorImages::className(), ['Vendor_1_Image_ID' => 'Vendor_Images_1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorImages2()
    {
        return $this->hasOne(VendorImages::className(), ['Vendor_1_Image_ID' => 'Vendor_Images_2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorImages3()
    {
        return $this->hasOne(VendorImages::className(), ['Vendor_1_Image_ID' => 'Vendor_Images_3']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorImages4()
    {
        return $this->hasOne(VendorImages::className(), ['Vendor_1_Image_ID' => 'Vendor_Images_4']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorImages5()
    {
        return $this->hasOne(VendorImages::className(), ['Vendor_1_Image_ID' => 'Vendor_Images_5']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorImages6()
    {
        return $this->hasOne(VendorImages::className(), ['Vendor_1_Image_ID' => 'Vendor_Images_6']);
    }
}
