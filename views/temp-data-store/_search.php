<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TempDataStoreSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="temp-data-store-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'CMSCustID') ?>

    <?= $form->field($model, 'ZipCorrect') ?>

    <?= $form->field($model, 'CYG_Original_Store_Code') ?>

    <?= $form->field($model, 'CYG_Last_Purchased_Store') ?>

    <?php // echo $form->field($model, 'CYG_Email_Opt_In_Flag') ?>

    <?php // echo $form->field($model, 'LastNonBuyerActivityDate') ?>

    <?php // echo $form->field($model, 'LastActivityDate') ?>

    <?php // echo $form->field($model, 'LastOverallActivityDate') ?>

    <?php // echo $form->field($model, 'LastOverallActivityDateInMonths') ?>

    <?php // echo $form->field($model, 'userID') ?>

    <?php // echo $form->field($model, 'userEmail') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
