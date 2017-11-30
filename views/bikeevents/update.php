<?php

use app\models\Userinfo;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BikeEvents */

$this->title = 'Update Events: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bike Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bike-events-update">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
	<p>
		<?= Html::a('View', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Manage Events', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
        'vendors' => $vendors,
        'activities' => $activities,
    ]) ?>

</div>
