<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BikeNightTemplate */

$this->title = $model->Bike_Night_ID;
$this->params['breadcrumbs'][] = ['label' => 'Bike Night Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-night-template-view">

    <h1 class="margin0px"><?= 'View details: '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Bike_Night_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Bike_Night_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a('Manage Bike Night Templates', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Bike_Night_ID',
            'Store_ID',
            'Date',
            'Time',
            'Vendor_1',
            'Vendor_2',
            'Vendor_3',
            'Vendor_4',
            'Vendor_5',
            'Vendor_6',
            'Vendor_7',
            'Vendor_8',
            'Vendor_9',
            'Vendor_10',
            'Vendor_11',
            'Vendor_12',
            'Vendor_13',
            'Vendor_14',
            'Vendor_15',
            'Vendor_16',
            'Vendor_17',
            'Vendor_18',
            'Vendor_19',
            'Vendor_20',
            'Combine',
            'Winter_Gear_Night',
            'Combine_Pre',
            'Skip',
            'Cancelled',
            'Deals_ID',
            'Give_Away_ID',
            'In_Store_Deal_ID',
            'Vendor_Images_1',
            'Vendor_Images_2',
            'Vendor_Images_3',
            'Vendor_Images_4',
            'Vendor_Images_5',
            'Vendor_Images_6',
            'Vendor_Images_7',
            'Vendor_Images_8',
            'Vendor_Images_9',
            'Vendor_Images_10',
            'Join_US_ID',
            'Rim_Strip_Toss',
            'Helmet_Toss',
            'Activities_1',
            'Activities_2',
            'Activities_3',
            'Activities_4',
            'Food_Refreshments',
            'Now_Hiring',
            'Activities_URL:url',
            'Reschedule_Date_If_Cancelled',
            'Activities3_URL:url',
            'Special_Event',
            'End_Date',
            'Event_Type_ID',
        ],
    ]) ?>

</div>
