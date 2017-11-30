<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JoinUs */

$this->title = 'Update Join Us: ' . ' ' . $model->Join_US_ID;
$this->params['breadcrumbs'][] = ['label' => 'Join uses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Join_US_ID, 'url' => ['view', 'id' => $model->Join_US_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="join-us-update">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
	<p>
		<? //= Html::a('View', ['view','id'=>$model->getPrimaryKey()], ['class' => 'btn btn-success']) ?>
		<?= Html::a('View', ['view', 'id' => $model->Join_US_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Manage Join uses', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
