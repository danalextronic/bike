<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FoodRefreshments */

$this->title = 'Create Food Refreshments';
$this->params['breadcrumbs'][] = ['label' => 'Food Refreshments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-refreshments-create">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	<p>
        <?= Html::a('Manage Food Refreshments', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
