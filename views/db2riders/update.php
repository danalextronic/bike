<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Db2Riders */

$this->title = 'Update Db2 Riders: ' . ' ' . $model->Riders_ID;
$this->params['breadcrumbs'][] = ['label' => 'Db2 Riders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Riders_ID, 'url' => ['view', 'id' => $model->Riders_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="db2-riders-update">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
	<p>
		<? //= Html::a('View', ['view','id'=>$model->getPrimaryKey()], ['class' => 'btn btn-success']) ?>
		<?= Html::a('View', ['view', 'id' => $model->Riders_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Manage Db2 Riders', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
