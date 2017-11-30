<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\BikeNightTemplate */

$this->title = 'Import';
$this->params['breadcrumbs'][] = ['label' => 'Import', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="bike-night-template-create">

    <h1 class="margin0px colorBlue"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
	<?php $form = ActiveForm::begin(['options'=>['class' => 'well well-sm','enctype'=>'multipart/form-data']]); ?>
	 <?= $form->errorSummary($model); ?>
	
    <?= $form->field($model, 'importFile')->fileInput() ?>
 

    <div class="form-group">
    	<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>		
    </div>

    <?php ActiveForm::end(); ?>

</div>