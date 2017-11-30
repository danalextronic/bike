<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image_url
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name', 'image_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'image_url' => 'Image Url',
        ];
    }

    public static function updateVendorData($vendors) {

        foreach ($vendors as $v)
        {
           $vendor = Vendor::findOne($v['vendor_id']);
           $vendor->description = $v['vendor_description'];
           $vendor->image_url = $v['vendor_image_url'];
           $vendor->save();
        }
    }
}
