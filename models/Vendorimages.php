<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor_images".
 *
 * @property integer $Vendor_1_Image_ID
 * @property string $Vendor_Name
 * @property string $Image_Location
 *
 * @property BikeNightTemplate[] $bikeNightTemplates
 * @property BikeNightTemplate[] $bikeNightTemplates0
 * @property BikeNightTemplate[] $bikeNightTemplates1
 * @property BikeNightTemplate[] $bikeNightTemplates2
 * @property BikeNightTemplate[] $bikeNightTemplates3
 * @property BikeNightTemplate[] $bikeNightTemplates4
 * @property BikeNightTemplate[] $bikeNightTemplates5
 * @property BikeNightTemplate[] $bikeNightTemplates6
 * @property BikeNightTemplate[] $bikeNightTemplates7
 * @property BikeNightTemplate[] $bikeNightTemplates8
 */
class Vendorimages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Vendor_Name', 'Image_Location'], 'string', 'max' => 255],
            [['Vendor_Name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Vendor_1_Image_ID' => 'Vendor 1  Image  ID',
            'Vendor_Name' => 'Vendor  Name',
            'Image_Location' => 'Image  Location',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeNightTemplates()
    {
        return $this->hasMany(BikeNightTemplate::className(), ['Vendor_Images_7' => 'Vendor_1_Image_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeNightTemplates0()
    {
        return $this->hasMany(BikeNightTemplate::className(), ['Vendor_Images_8' => 'Vendor_1_Image_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeNightTemplates1()
    {
        return $this->hasMany(BikeNightTemplate::className(), ['Vendor_Images_9' => 'Vendor_1_Image_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeNightTemplates2()
    {
        return $this->hasMany(BikeNightTemplate::className(), ['Vendor_Images_10' => 'Vendor_1_Image_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeNightTemplates3()
    {
        return $this->hasMany(BikeNightTemplate::className(), ['Vendor_Images_1' => 'Vendor_1_Image_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeNightTemplates4()
    {
        return $this->hasMany(BikeNightTemplate::className(), ['Vendor_Images_2' => 'Vendor_1_Image_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeNightTemplates5()
    {
        return $this->hasMany(BikeNightTemplate::className(), ['Vendor_Images_3' => 'Vendor_1_Image_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeNightTemplates6()
    {
        return $this->hasMany(BikeNightTemplate::className(), ['Vendor_Images_4' => 'Vendor_1_Image_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeNightTemplates7()
    {
        return $this->hasMany(BikeNightTemplate::className(), ['Vendor_Images_5' => 'Vendor_1_Image_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeNightTemplates8()
    {
        return $this->hasMany(BikeNightTemplate::className(), ['Vendor_Images_6' => 'Vendor_1_Image_ID']);
    }
}
