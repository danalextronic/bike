<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BikeEvents */

$this->title = 'Create Events';
$this->params['breadcrumbs'][] = ['label' => 'Bike Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bike-events-create">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	<p>
        <?= Html::a('Manage Events', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
