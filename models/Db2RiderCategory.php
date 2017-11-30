<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_2_rider_category".
 *
 * @property integer $Rider_Category_ID
 * @property string $Rider_Category
 *
 * @property Db2Riders[] $db2Riders
 */
class Db2RiderCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_2_rider_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Rider_Category'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Rider_Category_ID' => 'Rider  Category  ID',
            'Rider_Category' => 'Rider  Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDb2Riders()
    {
        return $this->hasMany(Db2Riders::className(), ['Rider_Category_ID' => 'Rider_Category_ID']);
    }
}
