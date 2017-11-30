<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Deals */

$this->title = 'Update Deals: ' . ' ' . $model->Deals_ID;
$this->params['breadcrumbs'][] = ['label' => 'Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Deals_ID, 'url' => ['view', 'id' => $model->Deals_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deals-update">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
	<p>
		<?= Html::a('View', ['view', 'id' => $model->Deals_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Manage Deals', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
        'brands_with_percents' => $brands_with_percents,
        'images' => $images,
    ]) ?>

</div>
