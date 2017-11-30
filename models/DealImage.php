<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "deal_image".
 *
 * @property integer $id
 * @property string $link
 */
class DealImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */



    public static function tableName()
    {
        return 'deal_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link'], 'required'],
            [['id'], 'integer'],
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
            'link' => 'Link',
        ];
    }

    public static function saveImage($link) {
        $im = new DealImage();
        $im->link = $link;
        $im->save();
        return $im;
    }
}
