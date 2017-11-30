<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FoodRefreshments */

$this->title = $model->Food_Refreshments_ID;
$this->params['breadcrumbs'][] = ['label' => 'Food Refreshments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-refreshments-view">

    <h1 class="margin0px"><?= 'View details: '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Food_Refreshments_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Food_Refreshments_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a('Manage Food Refreshments', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Food_Refreshments_ID',
            'Food_Refreshments',
            'Food_Refreshments_Image',
        ],
    ]) ?>

</div>
