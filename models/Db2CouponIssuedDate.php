<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_2_coupon_issued_date".
 *
 * @property integer $Coupon_Issued_Date_ID
 * @property integer $Riders_ID
 * @property string $EnterDate
 * @property integer $Coupon_ID
 * @property integer $Delete_Coupon
 * @property integer $Re_Issue_Coupon
 *
 * @property Db2Coupon $coupon
 * @property Db2Riders $riders
 */
class Db2CouponIssuedDate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_2_coupon_issued_date';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Riders_ID', 'Coupon_ID', 'Delete_Coupon', 'Re_Issue_Coupon'], 'integer'],
            [['EnterDate'], 'safe'],
            [['Delete_Coupon', 'Re_Issue_Coupon'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Coupon_Issued_Date_ID' => 'Coupon  Issued  Date  ID',
            'Riders_ID' => 'Riders  ID',
            'EnterDate' => 'Enter Date',
            'Coupon_ID' => 'Coupon  ID',
            'Delete_Coupon' => 'Delete  Coupon',
            'Re_Issue_Coupon' => 'Re  Issue  Coupon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoupon()
    {
        return $this->hasOne(Db2Coupon::className(), ['Coupon_ID' => 'Coupon_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiders()
    {
        return $this->hasOne(Db2Riders::className(), ['Riders_ID' => 'Riders_ID']);
    }
}
