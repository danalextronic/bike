<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GiveAway */

$this->title = 'Update Give Away: ' . ' ' . $model->Give_Away_ID;
$this->params['breadcrumbs'][] = ['label' => 'Give Aways', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Give_Away_ID, 'url' => ['view', 'id' => $model->Give_Away_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="give-away-update">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
	<p>
		<? //= Html::a('View', ['view','id'=>$model->getPrimaryKey()], ['class' => 'btn btn-success']) ?>
		<?= Html::a('View', ['view', 'id' => $model->Give_Away_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Manage Give Aways', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
