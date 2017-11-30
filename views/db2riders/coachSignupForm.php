<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Db2Stores;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Userinfo */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Rider Coach Signup Form';

$ShirtSize=Yii::$app->mycomponent->ShirtSize();

?>

<div class="userinfo-form">


<h1 class="margin0px colorBlue"><?= Html::encode($this->title) ?></h1>
<hr class="customHR"/>

<?php
    foreach(Yii::$app->session->getAllFlashes() as $key => $message)
    {
        echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
    } 
?>
    <?php $form = ActiveForm::begin(['layout' => 'horizontal','options'=>['enctype'=>'multipart/form-data']]); ?>
	<?= $form->errorSummary($model); ?>
	


	<div class="panel panel-info">
		<div class='panel-heading'>
			<strong>Store</strong>
		</div>
		<div class="panel-body">
			<?= $form->field($model, 'Stores_ID')->dropDownList(ArrayHelper::map(Db2Stores::find()->all(),'Stores_ID','Store_Code'),['prompt'=>"Please Select"]) ?>
   
		</div>
	</div>



	<div class="panel panel-info">
		<div class='panel-heading'>
			<strong>Rider Info</strong>
		</div>
		<div class="panel-body">
			<?= $form->field($model, 'Rider_Name')->textInput(['maxLength'=>true])->label("Rider Coach Name") ?>
   
		    <?= $form->field($model, 'Address')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'Address_2')->textInput(['maxlength' => true]) ?>  

			<?= $form->field($model, 'City')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'State')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'Zip')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'Phone_Number')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'Email_Address')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'Client_ID')->textInput(['maxlength' => true]) ?>
   
		</div>
	</div>

	<div class="panel panel-info">
		<div class='panel-heading'>
			<strong>MSF Information</strong>
		</div>
		<div class="panel-body">
			<?= $form->field($model, 'MSF_ID')->textInput() ?>


			<?= $form->field($model, 'MSF_Expiration')->widget(DatePicker::classname(), [
				'options' => ['placeholder' => ''],
				'pluginOptions' => [
					'autoclose' => true,
					'format' => 'yyyy-mm-dd'
				]
			]);
			?>

		</div>
	</div>

	<?= $form->field($model, 'Form_Type')->hiddenInput(['value'=> \app\models\Db2Riders::$FORM_TYPES[1]])->label(false) ?>

    <div class="form-group">
		<div class="col-sm-12">			
			<?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary'])?>
		</div>
	</div>

    <?php ActiveForm::end(); ?>

</div>
