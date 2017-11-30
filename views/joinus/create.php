<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JoinUs */

$this->title = 'Create Join Us';
$this->params['breadcrumbs'][] = ['label' => 'Join uses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="join-us-create">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	<p>
        <?= Html::a('Manage Join uses', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
