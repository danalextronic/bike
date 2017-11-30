<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Db2Riders */

$this->title = $model->Riders_ID;
$this->params['breadcrumbs'][] = ['label' => 'Db2 Riders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db2-riders-view">

    <h1 class="margin0px"><?= 'View details: '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Riders_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Riders_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a('Manage Db2 Riders', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Rider_Name',
            'RacerID',
            'AMA_Num',
            'Client_ID',
            'Count_Coupons_Issued',
            'Count_First_Place',
            'Count_Races_Completed',
            'Stores_ID',
            'Coupon_ID',
            'Last_Update',
            'Riders_ID',
            'Coupon_Limit',
            'Rider_Category_ID',
            'Create_Date',
            'Results_To_Process',
            'Address',
            'Address_2',
            'City',
            'State',
            'Zip',
            'Rider_Age',
            'Shirt_Size',
            'MSF_ID',
            'MSF_Expiration',
            'Approved',
            'Welcome_Packet_Sent',
            'Email_Address:email',
            'Phone_Number',
        ],
    ]) ?>

</div>
