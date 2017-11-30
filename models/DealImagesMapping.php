<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deal_images_mapping".
 *
 * @property integer $id
 * @property integer $deal_id
 * @property integer $image_id
 */
class DealImagesMapping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deal_images_mapping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deal_id', 'image_id'], 'required'],
            [['deal_id', 'image_id'], 'integer']
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
            'image_id' => 'Image ID',
        ];
    }

    public function getDealsImage()
    {
        return $this->hasOne(DealImage::className(), ['id' => 'image_id']);
    }

    public static function saveImageMapping($image, $deal) {
        $mapping = new DealImagesMapping();
        $mapping->deal_id = $deal->Deals_ID;
        $mapping->image_id = $image->id;
        $mapping->save();
    }
}
