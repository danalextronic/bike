<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InStoreDeal */

$this->title = 'Update In Store Deal: ' . ' ' . $model->In_Store_Deal_ID;
$this->params['breadcrumbs'][] = ['label' => 'In Store Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->In_Store_Deal_ID, 'url' => ['view', 'id' => $model->In_Store_Deal_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="in-store-deal-update">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
	<p>
		<? //= Html::a('View', ['view','id'=>$model->getPrimaryKey()], ['class' => 'btn btn-success']) ?>
		<?= Html::a('View', ['view', 'id' => $model->In_Store_Deal_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Manage In Store Deals', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
