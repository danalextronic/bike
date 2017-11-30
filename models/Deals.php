<?php

namespace app\models;

use Yii;
use yii\bootstrap\Html;

/**
 * This is the model class for table "deals".
 *
 * @property integer $Deals_ID
 * @property string $Deal_Name
 * @property integer $Join_US_ID
 *
 * @property BikeEvents[] $bikeEvents
 * @property DealBrandsMapping[] $dealBrandsMappings
 */
class Deals extends \yii\db\ActiveRecord
{

    public $imageFiles;
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'deals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Join_US_ID'], 'integer'],
            [['Join_US_ID'], 'required'],
            [['Deal_Name'], 'string', 'max' => 255],
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions'=>'jpg, gif, png, jpeg', 'maxFiles' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Deals_ID' => 'Deals  ID',
            'Deal_Name' => 'Deal  Name',
            'Join_US_ID' => 'Join  Us',
            'imageFiles' => 'New images',
        ];
    }

    public function getDealBrandsAsString() {
        $output = [];
        foreach ($this->dealBrands as $dealBrand) {
            $output[] = $dealBrand->Deal_Brand;
        }
        return implode(" | ",$output);
    }

    public function getDealImagesAsArray() {
        $output = [];
        foreach ($this->dealImages as $dealImage) {
            $output[] = Html::img(Yii::$app->request->baseUrl."/".$dealImage->link, ['width'=>100, 'height'=>'auto']);
        }
        return implode(" ",$output);
    }

    public function getDealJoinUsImage() {
        $output = '';
        if ($this->joinUs) {
            $output =  Html::img($this->joinUs->Join_US_Image, ['width'=>100, 'height'=>'auto']);
        }
        return $output;
    }

    public function getJoinUsImageLink() {
        return isset($this->joinUs->Join_US_Image) ? Html::a($this->joinUs->Join_US_Image) : '';
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeEvents()
    {
        return $this->hasMany(BikeEvents::className(), ['deals_id' => 'Deals_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDealBrandsMappings()
    {
        return $this->hasMany(DealBrandsMapping::className(), ['deal_id' => 'Deals_ID']);
    }


    public function getJoinUs()
    {
        return $this->hasOne(Joinus::className(), ['Join_US_ID' => 'Join_US_ID']);
    }

    public function getDealBrands() {
        return $this->hasMany(DealBrand::className(), ['Deal_Brand_ID' => 'deals_brand_id'])
            ->viaTable('deal_brands_mapping', ['deal_id' => 'Deals_ID']);
    }

    public function getPercentOff() {
        return $this->hasMany(PercentOff::className(), ['Percent_Off_ID' => 'percent_off_id'])
            ->viaTable('deal_brands_mapping', ['deal_id' => 'Deals_ID']);
    }

    public function getDealImages() {
        return $this->hasMany(DealImage::className(), ['id' => 'image_id'])
            ->viaTable('deal_images_mapping', ['deal_id' => 'Deals_ID']);
    }


}
