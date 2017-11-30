<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BikeNightTemplate */

$this->title = 'Create Bike Night Template';
$this->params['breadcrumbs'][] = ['label' => 'Bike Night Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-night-template-create">

    <h1 class="margin0px colorBlue"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	<p>
        <?= Html::a('Manage Bike Night Templates', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
