<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Db2Riders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="db2-riders-form">

    <?php $form = ActiveForm::begin(['options'=>['class' => 'well well-sm','enctype'=>'multipart/form-data']]); ?>
	 <?= $form->errorSummary($model); ?>
	
    <?= $form->field($model, 'Rider_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RacerID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AMA_Num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Client_ID')->textInput() ?>

    <?= $form->field($model, 'Count_Coupons_Issued')->textInput() ?>

    <?= $form->field($model, 'Count_First_Place')->textInput() ?>

    <?= $form->field($model, 'Count_Races_Completed')->textInput() ?>

    <?= $form->field($model, 'Stores_ID')->textInput() ?>

    <?= $form->field($model, 'Coupon_ID')->textInput() ?>

    <?= $form->field($model, 'Last_Update')->textInput() ?>

    <?= $form->field($model, 'Coupon_Limit')->textInput() ?>

    <?= $form->field($model, 'Rider_Category_ID')->textInput() ?>

    <?= $form->field($model, 'Create_Date')->textInput() ?>

    <?= $form->field($model, 'Results_To_Process')->textInput() ?>

    <?= $form->field($model, 'Address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'City')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'State')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Zip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Rider_Age')->textInput() ?>

    <?= $form->field($model, 'Shirt_Size')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MSF_ID')->textInput() ?>

    <?= $form->field($model, 'MSF_Expiration')->textInput() ?>

    <?= $form->field($model, 'Approved')->textInput() ?>

    <?= $form->field($model, 'Welcome_Packet_Sent')->textInput() ?>

    <?= $form->field($model, 'Email_Address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Phone_Number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
		&nbsp;
		<?= Html::submitButton($model->isNewRecord ? 'Create & go back to manage' : 'Update & go back to manage', ['name'=>'back_manage','value'=>1,'class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
