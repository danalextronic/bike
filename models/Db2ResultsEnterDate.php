<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_2_results_enter_date".
 *
 * @property string $RacerID_Enterdate
 * @property string $RacerID
 * @property string $Rider_Name
 * @property integer $Riders_ID
 * @property integer $Results_Added
 * @property integer $Names_Double_Checked
 * @property integer $Results_Enter_Date
 *
 * @property Db2Riders $riders
 */
class Db2ResultsEnterDate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_2_results_enter_date';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Riders_ID', 'Results_Added', 'Names_Double_Checked'], 'integer'],
            [['Results_Added', 'Names_Double_Checked'], 'required'],
            [['RacerID_Enterdate', 'RacerID', 'Rider_Name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'RacerID_Enterdate' => 'Racer Id  Enterdate',
            'RacerID' => 'Racer ID',
            'Rider_Name' => 'Rider  Name',
            'Riders_ID' => 'Riders  ID',
            'Results_Added' => 'Results  Added',
            'Names_Double_Checked' => 'Names  Double  Checked',
            'Results_Enter_Date' => 'Results  Enter  Date',
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
