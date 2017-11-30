<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GiveAway */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="give-away-form">

    <?php $form = ActiveForm::begin(['options'=>['class' => 'well well-sm','enctype'=>'multipart/form-data']]); ?>
	 <?= $form->errorSummary($model); ?>
	
    <?= $form->field($model, 'Give_Away')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Give_Away_Image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
		&nbsp;
		<?= Html::submitButton($model->isNewRecord ? 'Create & go back to manage' : 'Update & go back to manage', ['name'=>'back_manage','value'=>1,'class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
