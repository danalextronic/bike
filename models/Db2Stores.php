<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_2_stores".
 *
 * @property integer $Stores_ID
 * @property string $Store
 * @property integer $Rp#
 * @property string $Store_Code
 * @property integer $Racer_num
 * @property integer $WDC_Wave
 */
class Db2Stores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_2_stores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Rp#', 'Racer_num', 'WDC_Wave'], 'integer'],
            [['Store', 'Store_Code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Stores_ID' => 'Stores  ID',
            'Store' => 'Store',
            'Rp#' => 'Rp#',
            'Store_Code' => 'Store  Code',
            'Racer_num' => 'Racer Num',
            'WDC_Wave' => 'Wdc  Wave',
        ];
    }
}
