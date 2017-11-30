<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Db2Riders */

$this->title = 'Import_Results_Double_Check';
$this->params['breadcrumbs'][] = ['label' => 'Db2 Riders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db2-riders-missing-email">

    <h1 class="margin0px colorBlue"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
 'RacerID',
            ['attribute'=>'db_2_results_enter_date.Rider_Name','header'=>'Results_Enter_Date.Rider_Name'],
            'Riders_ID',
            ['attribute'=>'db_2_riders.Rider_Name','header'=>'Riders.Rider_Name'],
            //'AMA_Num',
           //'Client_ID',
           // 'Count_Coupons_Issued',
            // 'Count_First_Place',
            // 'Count_Races_Completed',
            // 'Stores_ID',
            // 'Coupon_ID',
            // 'Last_Update',
            // 'Riders_ID',
            // 'Coupon_Limit',
            // 'Rider_Category_ID',
            // 'Create_Date',
            // 'Results_To_Process',
            // 'Address',
            // 'Address_2',
            // 'City',
            // 'State',
            // 'Zip',
            // 'Rider_Age',
            // 'Shirt_Size',
            // 'MSF_ID',
            // 'MSF_Expiration',
            // 'Approved',
            // 'Welcome_Packet_Sent',
           
            // 'Phone_Number',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
