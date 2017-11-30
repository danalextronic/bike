<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_2_coupon".
 *
 * @property integer $Coupon_ID
 * @property integer $Coupon_num
 * @property string $Description
 * @property integer $Dollar_Amount
 * @property string $End_Date
 *
 * @property Db2CouponIssuedDate[] $db2CouponIssuedDates
 * @property Db2Riders[] $db2Riders
 */
class Db2Coupon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_2_coupon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Coupon_num', 'Dollar_Amount'], 'integer'],
            [['End_Date'], 'safe'],
            [['Description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Coupon_ID' => 'Coupon  ID',
            'Coupon_num' => 'Coupon Num',
            'Description' => 'Description',
            'Dollar_Amount' => 'Dollar  Amount',
            'End_Date' => 'End  Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDb2CouponIssuedDates()
    {
        return $this->hasMany(Db2CouponIssuedDate::className(), ['Coupon_ID' => 'Coupon_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDb2Riders()
    {
        return $this->hasMany(Db2Riders::className(), ['Coupon_ID' => 'Coupon_ID']);
    }
}
