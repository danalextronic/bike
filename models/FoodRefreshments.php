<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "food_refreshments".
 *
 * @property integer $Food_Refreshments_ID
 * @property string $Food_Refreshments
 * @property string $Food_Refreshments_Image
 */
class FoodRefreshments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'food_refreshments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Food_Refreshments', 'Food_Refreshments_Image'], 'string', 'max' => 255],
            [['Food_Refreshments'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Food_Refreshments_ID' => 'Food  Refreshments  ID',
            'Food_Refreshments' => 'Food  Refreshments',
            'Food_Refreshments_Image' => 'Food  Refreshments  Image',
        ];
    }
}
