<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hiring_positions".
 *
 * @property integer $id
 * @property string $name
 * @property string $link
 */
class HiringPositions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hiring_positions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'link'], 'required'],
            [['name'], 'string', 'max' => 150],
            [['link'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'link' => 'Link',
        ];
    }
}
