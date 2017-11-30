<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FoodRefreshments */

$this->title = 'Update Food Refreshments: ' . ' ' . $model->Food_Refreshments_ID;
$this->params['breadcrumbs'][] = ['label' => 'Food Refreshments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Food_Refreshments_ID, 'url' => ['view', 'id' => $model->Food_Refreshments_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="food-refreshments-update">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
	<p>
		<? //= Html::a('View', ['view','id'=>$model->getPrimaryKey()], ['class' => 'btn btn-success']) ?>
		<?= Html::a('View', ['view', 'id' => $model->Food_Refreshments_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Manage Food Refreshments', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
