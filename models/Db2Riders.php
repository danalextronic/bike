<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_2_riders".
 *
 * @property string $Rider_Name
 * @property string $Team_Leaders_Name
 * @property string $RacerID
 * @property string $AMA_Num
 * @property integer $Client_ID
 * @property integer $Count_Coupons_Issued
 * @property integer $Count_First_Place
 * @property integer $Count_Races_Completed
 * @property integer $Stores_ID
 * @property integer $Coupon_ID
 * @property string $Last_Update
 * @property integer $Riders_ID
 * @property integer $Coupon_Limit
 * @property integer $Rider_Category_ID
 * @property string $Create_Date
 * @property integer $Results_To_Process
 * @property string $Address
 * @property string $Address_2
 * @property string $City
 * @property string $State
 * @property string $Zip
 * @property integer $Rider_Age
 * @property string $Shirt_Size
 * @property integer $MSF_ID
 * @property string $MSF_Expiration
 * @property integer $Approved
 * @property integer $Welcome_Packet_Sent
 * @property string $Email_Address
 * @property string $Phone_Number
 * @property string $Form_Type
 *
 * @property Db2CouponIssuedDate[] $db2CouponIssuedDates
 * @property Db2RacingResults[] $db2RacingResults
 * @property Db2ResultsEnterDate[] $db2ResultsEnterDates
 * @property Db2RiderCategory $riderCategory
 * @property Db2Stores $stores
 * @property Db2Coupon $coupon
 */
class Db2Riders extends \yii\db\ActiveRecord
{

    public static $FORM_TYPES = ["rider", "coach"];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_2_riders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Client_ID', 'Count_Coupons_Issued', 'Count_First_Place', 'Count_Races_Completed', 'Stores_ID', 'Coupon_ID', 'Coupon_Limit', 'Rider_Category_ID', 'Results_To_Process', 'Approved', 'Welcome_Packet_Sent'], 'integer'],
            [['Shirt_Size', 'Rider_Age', 'Last_Update', 'Create_Date', 'MSF_Expiration', 'MSF_ID'], 'safe'],
            [['Rider_Name', 'Team_Leaders_Name', 'RacerID', 'AMA_Num', 'Address', 'Address_2', 'City', 'State', 'Zip', 'Email_Address', 'Phone_Number'], 'string', 'max' => 255],
            [['Form_Type'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Rider_Name' => 'Rider Name',
            'Team_Leaders_Name' => 'Team Leaders Name',
            'RacerID' => 'Racer ID',
            'AMA_Num' => 'Ama  Num',
            'Client_ID' => 'Client  ID',
            'Count_Coupons_Issued' => 'Count  Coupons  Issued',
            'Count_First_Place' => 'Count  First  Place',
            'Count_Races_Completed' => 'Count  Races  Completed',
            'Stores_ID' => 'Store',
            'Coupon_ID' => 'Coupon  ID',
            'Last_Update' => 'Last  Update',
            'Riders_ID' => 'Riders  ID',
            'Coupon_Limit' => 'Coupon  Limit',
            'Rider_Category_ID' => 'Rider  Category  ID',
            'Create_Date' => 'Create  Date',
            'Results_To_Process' => 'Results  To  Process',
            'Address' => 'Address',
            'Address_2' => 'Address 2',
            'City' => 'City',
            'State' => 'State',
            'Zip' => 'Zip',
            'Rider_Age' => 'Rider  Age',
            'Shirt_Size' => 'Shirt  Size',
            'MSF_ID' => 'Msf ID',
            'MSF_Expiration' => 'Msf Expiration',
            'Approved' => 'Approved',
            'Welcome_Packet_Sent' => 'Welcome  Packet  Sent',
            'Email_Address' => 'Email  Address',
            'Phone_Number' => 'Phone  Number',
            'Form_Type' => 'Form Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDb2CouponIssuedDates()
    {
        return $this->hasMany(Db2CouponIssuedDate::className(), ['Riders_ID' => 'Riders_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDb2RacingResults()
    {
        return $this->hasMany(Db2RacingResults::className(), ['Riders_ID' => 'Riders_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDb2ResultsEnterDates()
    {
        return $this->hasMany(Db2ResultsEnterDate::className(), ['Riders_ID' => 'Riders_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiderCategory()
    {
        return $this->hasOne(Db2RiderCategory::className(), ['id' => 'Rider_Category_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasOne(Db2Stores::className(), ['id' => 'Stores_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoupon()
    {
        return $this->hasOne(Db2Coupon::className(), ['Coupon_ID' => 'Coupon_ID']);
    }
}
