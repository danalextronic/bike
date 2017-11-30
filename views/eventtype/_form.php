<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventType */
/* @var $form yii\widgets\ActiveForm */

$YesNo=Yii::$app->mycomponent->getYesNo();

?>

<div class="event-type-form">

    <?php $form = ActiveForm::begin(['options'=>['class' => 'well well-sm','enctype'=>'multipart/form-data']]); ?>
	 <?= $form->errorSummary($model); ?>
	
    <?= $form->field($model, 'Event_Type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address_info')->dropDownList($YesNo,['prompt'=>"Please Select"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
		&nbsp;
		<?= Html::submitButton($model->isNewRecord ? 'Create & go back to manage' : 'Update & go back to manage', ['name'=>'back_manage','value'=>1,'class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
