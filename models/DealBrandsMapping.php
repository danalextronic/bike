<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deal_brands_mapping".
 *
 * @property integer $id
 * @property integer $deal_id
 * @property integer $deals_brand_id
 *
 * @property Deals $deal
 * @property DealBrand $dealsBrand
 */
class DealBrandsMapping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deal_brands_mapping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deal_id', 'deals_brand_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'deal_id' => 'Deal ID',
            'deals_brand_id' => 'Deals Brand ID'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeal()
    {
        return $this->hasOne(Deals::className(), ['Deals_ID' => 'deal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDealsBrand()
    {
        return $this->hasOne(DealBrand::className(), ['Deal_Brand_ID' => 'deals_brand_id']);
    }

}
