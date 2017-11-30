<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp_data_store".
 *
 * @property integer $id
 * @property integer $CMSCustID
 * @property string $ZipCorrect
 * @property string $CYG_Original_Store_Code
 * @property string $CYG_Last_Purchased_Store
 * @property string $CYG_Email_Opt_In_Flag
 * @property string $LastNonBuyerActivityDate
 * @property string $LastActivityDate
 * @property string $LastOverallActivityDate
 * @property integer $LastOverallActivityDateInMonths
 * @property integer $userID
 * @property string $userEmail
 */
class TempDataStore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_data_store';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CMSCustID', 'LastOverallActivityDateInMonths', 'userID'], 'integer'],
            [['LastNonBuyerActivityDate', 'LastActivityDate', 'LastOverallActivityDate'], 'safe'],
            [['ZipCorrect'], 'string', 'max' => 50],
            [['CYG_Original_Store_Code', 'CYG_Last_Purchased_Store', 'CYG_Email_Opt_In_Flag', 'userEmail'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'CMSCustID' => 'Cmscust ID',
            'ZipCorrect' => 'Zip Correct',
            'CYG_Original_Store_Code' => 'Cyg  Original  Store  Code',
            'CYG_Last_Purchased_Store' => 'Cyg  Last  Purchased  Store',
            'CYG_Email_Opt_In_Flag' => 'Cyg  Email  Opt  In  Flag',
            'LastNonBuyerActivityDate' => 'Last Non Buyer Activity Date',
            'LastActivityDate' => 'Last Activity Date',
            'LastOverallActivityDate' => 'Last Overall Activity Date',
            'LastOverallActivityDateInMonths' => 'Last Overall Activity Date In Months',
            'userID' => 'User ID',
            'userEmail' => 'User Email',
        ];
    }

    public static function getAllCustomers () {

    }
}
