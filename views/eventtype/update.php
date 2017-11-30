<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventType */

$this->title = 'Update Event Type: ' . ' ' . $model->Event_Type_ID;
$this->params['breadcrumbs'][] = ['label' => 'Event Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Event_Type_ID, 'url' => ['view', 'id' => $model->Event_Type_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-type-update">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
	<p>
		<? //= Html::a('View', ['view','id'=>$model->getPrimaryKey()], ['class' => 'btn btn-success']) ?>
		<?= Html::a('View', ['view', 'id' => $model->Event_Type_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Manage Event Types', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
