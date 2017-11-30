<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BikeNightTemplate */

$this->title = 'Update Bike Night Template: ' . ' ' . $model->Bike_Night_ID;
$this->params['breadcrumbs'][] = ['label' => 'Bike Night Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Bike_Night_ID, 'url' => ['view', 'id' => $model->Bike_Night_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bike-night-template-update">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
	<p>
		<? //= Html::a('View', ['view','id'=>$model->getPrimaryKey()], ['class' => 'btn btn-success']) ?>
		<?//= Html::a('View', ['view', 'id' => $model->Bike_Night_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Manage Bike Night Templates', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
