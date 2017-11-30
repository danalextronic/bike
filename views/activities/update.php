<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activities */

$this->title = 'Update Activities: ' . ' ' . $model->Activities_ID;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Activities_ID, 'url' => ['view', 'id' => $model->Activities_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="activities-update">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
	<p>
		<? //= Html::a('View', ['view','id'=>$model->getPrimaryKey()], ['class' => 'btn btn-success']) ?>
		<?= Html::a('View', ['view', 'id' => $model->Activities_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Manage Activities', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
