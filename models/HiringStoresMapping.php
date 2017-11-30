<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hiring_stores_mapping".
 *
 * @property integer $id
 * @property integer $hiring_id
 * @property integer $stores_id
 * @property integer $hiring_position_id
 *
 * @property Hiring $hiring
 * @property Store $stores
 */
class HiringStoresMapping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hiring_stores_mapping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hiring_id', 'stores_id', 'hiring_position_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hiring_id' => 'Hiring ID',
            'stores_id' => 'Stores ID',
            'hiring_position_id' => 'Hiring Position ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHiring()
    {
        return $this->hasOne(Hiring::className(), ['id' => 'hiring_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasOne(Store::className(), ['Store_ID' => 'stores_id']);
    }


    public static function getHiringStores($hiring_id)
    {
        $arr_StoreIds = self::find()->select(['stores_id'])->where(['hiring_id' => $hiring_id])->asArray()->all();

        $b_arral = [];
        foreach ($arr_StoreIds as $store_id) {
            $b_arral[] = $store_id['stores_id'];
        }
        return $b_arral;
    }

    public function getHiringPositions()
    {
        return $this->hasOne(HiringPositions::className(), ['id' => 'hiring_position_id']);
    }


}
