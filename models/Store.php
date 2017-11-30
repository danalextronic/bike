<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "store".
 *
 * @property integer $Store_ID
 * @property string $Store
 * @property string $Store_Name
 * @property string $Address_1
 * @property string $Address_2
 * @property string $City
 * @property string $State
 * @property string $Zip
 * @property string $Phone
 * @property string $Url
 *
 * @property BikeNightTemplate[] $bikeNightTemplates
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Store', 'Store_Name', 'Address_1', 'Address_2', 'City', 'State', 'Zip', 'Phone', 'Url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Store_ID' => 'Store  ID',
            'Store' => 'Store',
            'Store_Name' => 'Store  Name',
            'Address_1' => 'Address 1',
            'Address_2' => 'Address 2',
            'City' => 'City',
            'State' => 'State',
            'Zip' => 'Zip',
            'Phone' => 'Phone',
            'Url' => 'Url'
        ];
    }
    public static function storeCustomValidate($model) {
        if (empty($model->StoreIds)) {
            $model->addError('StoreIds','Store cannot be blank.');
            return true;
        } else {
            return false;
        }

    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeNightTemplates()
    {
        return $this->hasMany(BikeNightTemplate::className(), ['Store_ID' => 'Store_ID']);
    }

    public function getHiringPositions() {
        return $this->hasMany(HiringPositions::className(), ['id' => 'hiring_position_id'])
            ->viaTable('hiring_stores_mapping', ['stores_id' => 'Store_ID']);
    }

    public function getZipCodes() {
        return $this->hasMany(StoreZip::className(), ['store_id' => 'Store_ID']);
    }
}
