<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deal_brand".
 *
 * @property integer $Deal_Brand_ID
 * @property string $Deal_Brand
 * @property string $Deal_Brand_Value
 * @property string $Deal_Brand_Image
 *
 * @property DealBrandsMapping[] $dealBrandsMappings
 */
class DealBrand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deal_brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Deal_Brand', 'Deal_Brand_Image', 'Deal_Brand_Value'], 'string', 'max' => 255],
            [['Deal_Brand'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Deal_Brand_ID' => 'Brand  ID',
            'Deal_Brand' => 'Brand',
            'Deal_Brand_Value' => 'Deal Brand Value',
            'Deal_Brand_Image' => 'Brand  Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDealBrandsMappings()
    {
        return $this->hasMany(DealBrandsMapping::className(), ['deals_brand_id' => 'Deal_Brand_ID']);
    }

    public static function updateDealBrandData($brands) {
        foreach ($brands as $b)
        {
            $brand = DealBrand::findOne($b['brand_name']);
            //$brand->Deal_Brand = $b[''];
            //$brand->save();

        }
    }
}
