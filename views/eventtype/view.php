<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EventType */

$this->title = $model->Event_Type_ID;
$this->params['breadcrumbs'][] = ['label' => 'Event Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-type-view">

    <h1 class="margin0px"><?= 'View details: '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Event_Type_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Event_Type_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a('Manage Event Types', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Event_Type_ID',
            'Event_Type',
            'Address_info',
        ],
    ]) ?>

</div>
