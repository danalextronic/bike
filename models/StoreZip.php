<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "store_zip".
 *
 * @property integer $id
 * @property integer $store_id
 * @property string $zipcode
 */
class StoreZip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_zip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_id', 'zipcode'], 'required'],
            [['store_id'], 'integer'],
            [['zipcode'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'store_id' => 'Store ID',
            'zipcode' => 'Zipcodes',
        ];
    }

    public static function getAllZipCodesByStoreId($storeId) {
        $query =  self::find()->where(['store_id'=>$storeId])->asArray()->all();
        $zipCodes = [];
        foreach ($query as $zip_code) {
            $zipCodes[] = $zip_code['zipcode'];
        }
        return $zipCodes;
    }

    public function getZipCodesAsString() {
        $result = [];
        if ($this->store->zipCodes) {
            foreach ($this->store->zipCodes as $zipcode) {
                $result[] = $zipcode['zipcode'];
            }
        }
        return implode(",", $result);
    }

    public function getStore()
    {
        return $this->hasOne(Store::className(), ['Store_ID' => 'store_id']);
    }
}
