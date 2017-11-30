<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "join_us".
 *
 * @property integer $Join_US_ID
 * @property string $Join_US
 * @property string $Join_US_Image
 *
 * @property BikeNightTemplate[] $bikeNightTemplates
 */
class Joinus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'join_us';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Join_US', 'Join_US_Image'], 'string', 'max' => 255],
            [['Join_US'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Join_US_ID' => 'Join  Us  ID',
            'Join_US' => 'Join  Us',
            'Join_US_Image' => 'Join  Us  Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeNightTemplates()
    {
        return $this->hasMany(BikeNightTemplate::className(), ['Join_US_ID' => 'Join_US_ID']);
    }
}
