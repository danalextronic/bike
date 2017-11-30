<?php
namespace app\components;
 
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
 
class MyComponent extends Component
{
	public function ShirtSize()
	{
		$data = [];
		$data['YM'] = "YM";
		$data['YL'] = "YL";
		$data['S'] = "S";
		$data['M'] = "M";
		$data['L'] = "L";
		$data['XL'] = "XL";
		$data['2XL'] = "2XL";
		return $data;
	}

	public function getYesNo()
	{
		$data = [];
		$data['0'] = "No";
		$data['1'] = "Yes";		
		return $data;
	}


	public function myDate($date,$format=null)
	{
		$rdate=null;
		if($date!=null && strcmp($date,"")!=0)
		{
			if($format==null)
			{
				$date = strtotime($date);;
				$rdate =  date('Y-m-d',$date);
			}
			else
			{
				$date = strtotime($date);;
				$rdate =  date($format,$date);
			}
		}
		return $rdate;
	}
}
?>