<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "give_away".
 *
 * @property integer $Give_Away_ID
 * @property string $Give_Away
 * @property string $Give_Away_Image
 *
 * @property BikeNightTemplate[] $bikeNightTemplates
 */
class GiveAway extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'give_away';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Give_Away', 'Give_Away_Image'], 'string', 'max' => 255],
            [['Give_Away'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Give_Away_ID' => 'Give  Away  ID',
            'Give_Away' => 'Give  Away',
            'Give_Away_Image' => 'Give  Away  Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikeNightTemplates()
    {
        return $this->hasMany(BikeNightTemplate::className(), ['Give_Away_ID' => 'Give_Away_ID']);
    }
}
