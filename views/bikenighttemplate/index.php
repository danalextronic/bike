<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BikeNightTemplateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bike Night Templates';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
");

?>

<div class="bike-night-template-index">

    <h1 class="margin0px"><?= 'Manage '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>

    <p>
        <?= Html::a('Create Bike Night Template', ['create'], ['class' => 'btn btn-success']) ?>
		<?= Html::a('Advanced Search', ['#'], ['class' => 'btn btn-default search-button']) ?>
    </p>
	
	<div class="search-form" style="display:none">
		    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
		</div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Bike_Night_ID',
            'Store_ID',
            'Date',
            'Time',
            'Vendor_1',
            // 'Vendor_2',
            // 'Vendor_3',
            // 'Vendor_4',
            // 'Vendor_5',
            // 'Vendor_6',
            // 'Vendor_7',
            // 'Vendor_8',
            // 'Vendor_9',
            // 'Vendor_10',
            // 'Vendor_11',
            // 'Vendor_12',
            // 'Vendor_13',
            // 'Vendor_14',
            // 'Vendor_15',
            // 'Vendor_16',
            // 'Vendor_17',
            // 'Vendor_18',
            // 'Vendor_19',
            // 'Vendor_20',
            // 'Combine',
            // 'Winter_Gear_Night',
            // 'Combine_Pre',
            // 'Skip',
            // 'Cancelled',
            // 'Deals_ID',
            // 'Give_Away_ID',
            // 'In_Store_Deal_ID',
            // 'Vendor_Images_1',
            // 'Vendor_Images_2',
            // 'Vendor_Images_3',
            // 'Vendor_Images_4',
            // 'Vendor_Images_5',
            // 'Vendor_Images_6',
            // 'Vendor_Images_7',
            // 'Vendor_Images_8',
            // 'Vendor_Images_9',
            // 'Vendor_Images_10',
            // 'Join_US_ID',
            // 'Rim_Strip_Toss',
            // 'Helmet_Toss',
            // 'Activities_1',
            // 'Activities_2',
            // 'Activities_3',
            // 'Activities_4',
            // 'Food_Refreshments',
            // 'Now_Hiring',
            // 'Activities_URL:url',
            // 'Reschedule_Date_If_Cancelled',
            // 'Activities3_URL:url',
            // 'Special_Event',
            // 'End_Date',
            // 'Event_Type_ID',

            ['class' => 'yii\grid\ActionColumn','template' => '{update} {delete}',],
        ],
    ]); ?>

</div>
