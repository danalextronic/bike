<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Db2RidersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Db2 Riders';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
");

?>

<div class="db2-riders-index">

    <h1 class="margin0px"><?= 'Manage '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>

    <p>
        <?= Html::a('Create Db2 Riders', ['create'], ['class' => 'btn btn-success']) ?>
		<?= Html::a('Advanced Search', ['#'], ['class' => 'btn btn-default search-button']) ?>
    </p>
	
	<div class="search-form" style="display:none">
		    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
		</div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Rider_Name',
            'RacerID',
            'AMA_Num',
            'Client_ID',
            'Count_Coupons_Issued',
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
            // 'Email_Address:email',
            // 'Phone_Number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
