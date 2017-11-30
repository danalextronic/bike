<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GiveAway */

$this->title = 'Create Give Away';
$this->params['breadcrumbs'][] = ['label' => 'Give Aways', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="give-away-create">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	<p>
        <?= Html::a('Manage Give Aways', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
