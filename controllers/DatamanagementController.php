<?php

namespace app\controllers;

use app\models\BikeEvents;
use app\models\Deals;
use app\models\Store;
use Yii;
use yii\db\Query;
use yii\helpers\BaseFileHelper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

use app\models\Datamanagement;
use app\models\TempDataStore;


class DatamanagementController extends Controller
{
	private static $limit = 500;
	private static $batchSize = 1000;

	public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
			
			'access' => [
                'class' => AccessControl::className(),
                'only' => ['import','export'],
                'rules' => [                    
                    [
                        'allow' => true,
                        'actions' => ['import','export'],
                        'roles' => ['@'],     
                    ], 
                ],
            ],
			
        ];
    }

    public function actionImport()
    {
    	$model = new Datamanagement;
    	$model->scenario = 'import';

    	if(Yii::$app->request->isPost)
    	{
    		$model->importFile = UploadedFile::getInstance($model,'importFile');

    		if($model->validate())
    		{
    			// Deleting Old Data of this user
    			TempDataStore::deleteAll('userID=:UID',[':UID'=>Yii::$app->user->identity->id]);

    			$lines = 0;
    			//$tempLoc=$model->importFile->getTempName(); 	
				
				$file = fopen($model->importFile->tempName, "r");

	    		while (($linearray = fgetcsv($file,0,",")) !== FALSE) 
				{
					$lines++;
					
					if($lines!=1)
					{						
						if(count($linearray) > 1)
						{

							$mdl_TempDataStore = new TempDataStore;

							$mdl_TempDataStore->CMSCustID = $linearray[0];
							$mdl_TempDataStore->ZipCorrect = null;
							$mdl_TempDataStore->CYG_Original_Store_Code = $linearray[1];
							$mdl_TempDataStore->CYG_Last_Purchased_Store = $linearray[2];
							$mdl_TempDataStore->CYG_Email_Opt_In_Flag = $linearray[3];
							$mdl_TempDataStore->LastNonBuyerActivityDate = $linearray[4];
							$mdl_TempDataStore->LastActivityDate = date('Y-d-m',strtotime($linearray[5]));
							$mdl_TempDataStore->LastOverallActivityDate = date('Y-d-m',strtotime($linearray[6]));
							$mdl_TempDataStore->LastOverallActivityDateInMonths = $linearray[7];
							
							$mdl_TempDataStore->userID = Yii::$app->user->identity->id;

							$mdl_TempDataStore->save();
						}						
					}
				}
				
			}
			
    	}

        return $this->render('import', ['model'=>$model]);
    }

    public function actionExport() {
		$num_of_things = 10;
    	$model = new Datamanagement;
    	$model->scenario = 'export';

    	if(Yii::$app->request->isPost) {
			$store_radio = $_POST['Datamanagement']['customerStore'];
			$date_radio = $_POST['Datamanagement']['customerDate'];

			$customerDate = $date_radio == "2" ? $_POST['Datamanagement']['numOfDays'] : $_POST['Datamanagement']['activityDate'];

			$diff = $date_radio == "2" ? $customerDate : date("Y-m-d", strtotime($customerDate));

			$where = "";
			switch ($date_radio) {
				case "0":
					// lastAD
					$where = 'tds.`LastActivityDate` > "'.$diff.'"';
					break;
				case "1":
					// lastOverallAD
					$where = 'tds.`LastOverallActivityDate` > "'.$diff.'"';
					break;
				case "2":
					$where = 'tds.`LastOverallActivityDateInMonths` > "'.intval($diff).'"';
					break;
			}


			if($model->load(Yii::$app->request->post()) && $model->validate())
    		{

				$query = (new Query())
					->select("be.`id`, CONCAT(be.`start_date`, CONCAT('  - ',be.`end_date`)), tds.`CMSCustID`, tds.`userEmail`,tds.`CYG_Original_Store_Code`, tds.`CYG_Last_Purchased_Store`, tds.`LastActivityDate`,
					tds.`LastOverallActivityDate`, tds.`LastOverallActivityDateInMonths`, s.`Store_ID`, s.`Store`, s.`Store_Name`, s.`Address_1`, s.`Address_2`,
					s.`Phone`, s.`Url`, be.`id`, be.`event_template_titles`, be.`start_date`, be.`end_date`, be.`eventTime`, et.`Event_Type`, ga.`Give_Away`, ga.`Give_Away_Image`,
					isd.`In_Store_Deal`, isd.`In_Store_Deal_Image`, fr.`Food_Refreshments`, fr.`Food_Refreshments_Image`,
					ju.`Join_US`, ju.`Join_US_Image`, be.`deals_id`")
					->from('temp_data_store tds')
					->innerJoin('store s',"tds.`CYG_Original_Store_Code` = s.`Store` OR tds.`CYG_Last_Purchased_Store` = s.`Store` OR tds.`ZipCorrect` = s.`Zip`")
					->innerJoin('store_bike_events sbe',"sbe.`store_id` = s.`Store_ID`")
					->innerJoin('bike_events be',"be.`id` = sbe.`bike_events_id`")
					->innerJoin('give_away ga',"be.`give_away_id` = ga.`Give_Away_ID`")
					->innerJoin('in_store_deal isd',"be.`in_store_deal_id` = isd.`In_Store_Deal_ID`")
					->innerJoin('food_refreshments fr',"be.`food_refreshments_id` = fr.Food_Refreshments_ID")
					->innerJoin('event_type et',"be.`eventTypeId` = et.`Event_Type_ID`")
					->innerJoin('join_us ju',"be.`join_us_id` = ju.`Join_US_ID`")
					->andWhere($where);


				$path = "csv/admin/" . date("Y-m-d");
				BaseFileHelper::createDirectory($path);
				$filename = $path . "/" . strtotime("now") . '.csv';
				$f = fopen($filename, "w");

				$fm = fopen('php://memory', 'w');
				$header = $this->setTableHeader();
				$header = $this->addMultipleRows($num_of_things, $header);

				fputcsv($f, array_values($header),',');
				fputcsv($fm, array_values($header),',');

				if ($query->count()) {
					foreach ($query->batch(self::$batchSize) as $current_batch) {
						foreach ($current_batch as $row) {
							//conditions
							$asOriginal = $store_radio == "0" && $row['CYG_Original_Store_Code'] === $row['Store'];
							$asLastPurchased = $store_radio == "1" && $row['CYG_Last_Purchased_Store'] == $row['Store'];
							$anyway = $store_radio == "2";

							if ($asOriginal || $asLastPurchased || $anyway) {

								$bike_event = BikeEvents::find()
									->select(['id'])
									->where(['id' => $row['id']])
									->with('activities')
									->with('vendors')
									->asArray()
									->one();

								/*Fill Activities*/

								$activities = $bike_event['activities'];
								$activity_counter = 1;

								foreach ($activities as $activity) {
									$row['Activity_' . $activity_counter . '_Name'] = $this->notEmpty($activity['Activities']);
									$row['Activity_' . $activity_counter . '_Image'] = $this->notEmpty($activity['Activities_Image']);
									$activity_counter++;
								}
								$row = $this->addEmptyFields($row, $num_of_things, $activity_counter, 'Activity', ['Name', 'Image']);

								/*Fill Vendors*/

								$vendors = $bike_event['vendors'];
								$vendor_counter = 1;

								foreach ($vendors as $vendor) {
									$row['Vendor_' . $vendor_counter . '_Name'] = $this->notEmpty($vendor['name']);
									$row['Vendor_' . $vendor_counter . '_Description'] = $this->notEmpty($vendor['description']);
									$row['Vendor_' . $vendor_counter . '_Image'] = $this->notEmpty($vendor['image_url']);
									$vendor_counter++;
								}
								$row = $this->addEmptyFields($row, $num_of_things, $vendor_counter, 'Vendor', ['Name', 'Description', 'Image']);

								/*
								 * Fill Deals
								 * Here deals is a pair of values Brand - PercentOff
								 * */

								$deal = Deals::find()
									->select(['Deals_ID'])
									->where(['Deals_ID' => $row['deals_id']])
									->with('dealBrands')
									->with('dealImages')
									->asArray()
									->one();

								$deal_counter = 1;
								foreach ($deal["dealBrands"] as $brand) {
										$row['Deal_' . $deal_counter . '_Brand'] = $this->notEmpty($brand['Deal_Brand_Image']);
										$row['Deal_' . $deal_counter . '_PercentOff'] = $this->notEmpty($brand['Deal_Brand_Value']);
										$deal_counter++;
								}
								$row = $this->addEmptyFields($row, $num_of_things, $deal_counter, 'Deal', ['Brand', 'PercentOff']);

								/* Fill Deal Images */

								$deals_images = $deal["dealImages"];
								$deals_images_counter = 1;

								foreach ($deals_images as $deal_image) {
									$row['Deal_Image_' . $deals_images_counter . '_Link'] = $this->notEmpty($deal_image['link']);
									$deals_images_counter++;
								}
								$row = $this->addEmptyFields($row, $num_of_things, $deals_images_counter, 'Deal_Image', ['Link']);

								/*Fill Positions*/

								$hiringPositions = Store::find()
									->select(['Store_ID'])
									->where(['Store_ID' => $row['Store_ID']])
									->with('hiringPositions')
									->asArray()
									->one();

								$positions = $hiringPositions["hiringPositions"];
								$position_counter = 1;

								foreach ($positions as $position) {
									$row['Position_' . $position_counter . '_Name'] = $this->notEmpty($position['name']);
									$row['Position_' . $position_counter . '_Link'] = $this->notEmpty($position['link']);
									$position_counter++;
								}
								$row = $this->addEmptyFields($row, $num_of_things, $position_counter, 'Position', ['Name', 'Link']);

								unset($row["deals_id"]);

								fputcsv($f, $row, ',');
								fputcsv($fm, $row, ',');
							}
						}
					}
				}
			
				fseek($fm, 0);
				$now = date("Y/m/d h:i");
				header("Expires: Tue, 03 Jul 2016 06:00:00 GMT");
				header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
				header("Last-Modified: {$now} GMT");

				// force download
				header("Content-Type: application/force-download");
				header("Content-Type: application/octet-stream");
				header("Content-Type: application/download");

				// disposition / encoding on response body
				header("Content-Disposition: attachment;filename=export.csv");
				header("Content-Transfer-Encoding: binary");
				fpassthru($fm);
				fclose($fm);

				fseek($f, 0);
				include('../aws/s3fileupload.php');

				fclose($f);

				return $this->redirect(["export"]);
    		}

    	}

        return $this->render('export', [
				'model'=>$model,
		]);
    }

	public function setTableHeader () {

		return [
			"Event ID",
			"Event Date",
			"CustomerID",
			"Customer Email",
			"Original Store Code",
			"Last Purchased Store",
			"Last Activity Date",
			"Last Overall Activity Date",
			"Last Overall Activity Date in Months",
			"Store ID",
			"Store",
			"Store Name",
			"Address 1",
			"Address 2",
			"Phone",
			"Url",
			"Bike Event ID",
			"Event Template Titles",
			"Start Date",
			"End Date",
			"Event Time",
			"Event Type",
			"Give Away",
			"Give Away Image",
			"In Store Deal",
			"In Store Deal Image",
			"Food Refreshments",
			"Food Refreshments Image",
			"Join Us",
			"Join Us Image",
		];
	}

	public function addMultipleRows ($n, $array) {
		for ($i = 1; $i < $n; $i++) {
			array_push($array, "Activity_".$i."_Name", "Activity_".$i."_Image"/*, "Activity_".$i."_Hyperlink"*/);
		}
		for ($i = 1; $i < $n; $i++) {
			array_push($array, "Vendor_".$i."_Name", "Vendor_".$i."_Description", "Vendor_".$i."_Image");
		}
		for ($i = 1; $i < $n; $i++) {
			array_push($array, "Deal_".$i."_Brand", "Deal_".$i."_PercentOff");
		}
		for ($i = 1; $i < $n; $i++) {
			array_push($array, "Deal_Image".$i."_Link");
		}
		for ($i = 1; $i < $n; $i++) {
			array_push($array, "Position_".$i."_Name", "Position_".$i."_Link");
		}

		return $array;
	}

	public function formHeaderProperty ($name, $props, $num=0) {
		$arr = [];
		for ($i = 0; $i < count($props); $i++ ) {
			array_push($arr, $name."_".$num."_".$props[$i]);
		}
		return $arr;
	}
	//$row - object, where empty fields are added
	//$n - number of particular headers (e.i. Vendor_1, ..., Vendor_n)
	//$filled - number of fields, which already filled by info
	//$name - name of the property, i.e. Vendor, Activity etc.
	//$props - array of properties of the header, i.e. Name, Image, Link etc.
	public function addEmptyFields ($row, $n, $filled, $name, $props) {
		for ($i = $filled; $i < $n; $i++) {
			$prop_names = $this->formHeaderProperty($name, $props, $i);
			//at the end we have an array of properties such "[Vendor_1_Name, Vendor_1_Desc, Vendor_1_Image]"
			foreach ($prop_names as $prop_name) {
				$row[$prop_name] = "-";
			}
		}
		return $row;
	}

	public function notEmpty($prop)
	{
		return $prop ? $prop : "NULL";
	}

}
