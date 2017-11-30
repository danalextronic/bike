<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Userinfo;

/* @var $this yii\web\View */
/* @var $model app\models\BikeEvents */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-events-view">

    <h1 class="margin0px"><?= 'View details: '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
        <?php
         $userTypeId = Yii::$app->user->identity->userTypeId;

        if($userTypeId == Userinfo::ADMIN_USER_TYPE_ID)
        {
             echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
             
        }
       

        ?>
		<?= Html::a('Manage Events', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'event_template_titles',
            'start_date',
            'end_date',
            'eventTime',
            [
                'label'=>'Event Type',
                'type'=>'raw',
                'value'=> isset($model->eventType->Event_Type) ? $model->eventType->Event_Type : "",
            ],
            [
                'label'=>'Join Us',
                'type'=>'raw',
                'value'=> isset($model->joinUs->Join_US) ? $model->joinUs->Join_US : "",
            ],
            [
                'label'=>'Food Refreshments',
                'type'=>'raw',
                'value'=> isset($model->foodRefreshments->Food_Refreshments) ? $model->foodRefreshments->Food_Refreshments : "",
            ],
            [
                'label'=>'Give Away',
                'type'=>'raw',
                'value'=> isset($model->giveAway->Give_Away) ? $model->giveAway->Give_Away : "",
            ],
            [
                'label'=>'In Store Deal',
                'type'=>'raw',
                'value'=> isset($model->inStoreDeal->In_Store_Deal) ? $model->inStoreDeal->In_Store_Deal : "",
            ],
            [
                'label'=>'Deals',
                'type'=>'raw',
                'value'=> isset($model->deals->Deal_Name) ? $model->deals->Deal_Name : "",
            ],
            [
                'label'=>'Stores',
                'type'=>'raw',
                'value'=> $model->getStoresAsString(),
            ],
            [
                'label'=>'Vendors',
                'type'=>'raw',
                'value'=> $model->getVendorsAsString(),
            ],
            [
                'label'=>'Activities',
                'type'=>'raw',
                'value'=>$model->getActivitiesAsString(),
            ],
        ],
    ]) ?>

</div>
