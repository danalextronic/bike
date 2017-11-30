<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TempDataStore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="temp-data-store-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CMSCustID')->textInput() ?>

    <?= $form->field($model, 'ZipCorrect')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CYG_Original_Store_Code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CYG_Last_Purchased_Store')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CYG_Email_Opt_In_Flag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LastNonBuyerActivityDate')->textInput() ?>

    <?= $form->field($model, 'LastActivityDate')->textInput() ?>

    <?= $form->field($model, 'LastOverallActivityDate')->textInput() ?>

    <?= $form->field($model, 'LastOverallActivityDateInMonths')->textInput() ?>

    <?= $form->field($model, 'userID')->textInput() ?>

    <?= $form->field($model, 'userEmail')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
