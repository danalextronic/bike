<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "percent_off".
 *
 * @property integer $Percent_Off_ID
 * @property string $Percent_Off
 * @property string $Percent_Off_Image
 *
 * @property DealPercentsOffMapping[] $dealPercentsOffMappings
 */
class PercentOff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'percent_off';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Percent_Off', 'Percent_Off_Image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Percent_Off_ID' => 'Percent  Off  ID',
            'Percent_Off' => 'Percent  Off',
            'Percent_Off_Image' => 'Percent  Off  Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDealPercentsOffMappings()
    {
        return $this->hasMany(DealPercentsOffMapping::className(), ['percent_off_id' => 'Percent_Off_ID']);
    }
}
