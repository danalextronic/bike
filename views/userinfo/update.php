<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userinfo */

$this->title = 'Update User: ' . ' ' . $model->userId;
$this->params['breadcrumbs'][] = ['label' => 'Userinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->userId, 'url' => ['view', 'id' => $model->userId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userinfo-update">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
	<p>
		<? //= Html::a('View', ['view','id'=>$model->getPrimaryKey()], ['class' => 'btn btn-success']) ?>
		<?= Html::a('View', ['view', 'id' => $model->userId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Manage Users', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
