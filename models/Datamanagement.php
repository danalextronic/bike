<?php

namespace app\models;

use yii\base\Model;

class Datamanagement extends Model
{
	public $importFile;
	public $zipCodes;
	public $month;

	public $numOfDays;
	public $activityDate;

	public $customerDate;
	public $customerStore;

	public function rules()
	{
		return [
			['importFile','required', 'on' => 'import'],			
			['customerStore','required', 'on' => 'export'],
			['month','integer'],
			[['importFile'],'file'],
			['zipCodes','string'],
			['activityDate','string'],
			['numOfDays', 'integer'],
			['customerDate','integer'],
			['customerStore','integer'],
			];
	}

	public function attributeLabels()
    {
        return [
            'importFile' => 'File',            
            'zipCodes' => 'Zip Codes',   
            'month' => 'Select Month',
			'numOfDays' => 'Number of days',
			'activityDate' => 'Select Date',
        ];
    }

}


