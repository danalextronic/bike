<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_2_racing_results".
 *
 * @property integer $Racing_Results_ID
 * @property integer $Riders_ID
 * @property string $Venue_Track
 * @property string $Organizer
 * @property string $Website
 * @property string $Class
 * @property integer $Position
 * @property integer $Size
 * @property integer $First_Place_Qualify
 * @property string $Race_Date
 * @property integer $Approved
 * @property integer $Processed
 * @property integer $New_Result
 * @property string $Email_Address
 * @property string $Input_Date
 *
 * @property Db2Riders $riders
 */
class Db2RacingResults extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_2_racing_results';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Riders_ID', 'Position', 'Size', 'First_Place_Qualify', 'Approved', 'Processed', 'New_Result'], 'integer'],
            [['Race_Date', 'Input_Date'], 'safe'],
            [['Venue_Track', 'Organizer', 'Website', 'Class', 'Email_Address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Racing_Results_ID' => 'Racing  Results  ID',
            'Riders_ID' => 'Riders  ID',
            'Venue_Track' => 'Venue  Track',
            'Organizer' => 'Organizer',
            'Website' => 'Website',
            'Class' => 'Class',
            'Position' => 'Position',
            'Size' => 'Size',
            'First_Place_Qualify' => 'First  Place  Qualify',
            'Race_Date' => 'Race  Date',
            'Approved' => 'Approved',
            'Processed' => 'Processed',
            'New_Result' => 'New  Result',
            'Email_Address' => 'Email  Address',
            'Input_Date' => 'Input  Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiders()
    {
        return $this->hasOne(Db2Riders::className(), ['Riders_ID' => 'Riders_ID']);
    }
}
