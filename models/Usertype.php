<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usertype".
 *
 * @property integer $userTypeId
 * @property string $typeName
 *
 * @property Userinfo[] $userinfos
 */
class Usertype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usertype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['typeName'], 'required'],
            [['typeName'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userTypeId' => 'User Type ID',
            'typeName' => 'Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserinfos()
    {
        return $this->hasMany(Userinfo::className(), ['userTypeId' => 'userTypeId']);
    }
}
