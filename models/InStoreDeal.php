<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_store_deal".
 *
 * @property integer $In_Store_Deal_ID
 * @property string $In_Store_Deal
 * @property string $In_Store_Deal_Image
 */
class InStoreDeal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'in_store_deal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['In_Store_Deal', 'In_Store_Deal_Image'], 'string', 'max' => 255],
            [['In_Store_Deal'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'In_Store_Deal_ID' => 'In  Store  Deal  ID',
            'In_Store_Deal' => 'In  Store  Deal',
            'In_Store_Deal_Image' => 'In  Store  Deal  Image',
        ];
    }
}
