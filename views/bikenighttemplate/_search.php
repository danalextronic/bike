<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* use yii\helpers\ArrayHelper; */

/* @var $this yii\web\View */
/* @var $model app\models\BikeNightTemplateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bike-night-template-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
		'layout' => 'horizontal',
        'method' => 'get',
		'options' => ['class'=>'form well well-sm'],
    ]); ?>

    <?= $form->field($model, 'Bike_Night_ID') ?>

    <?= $form->field($model, 'Store_ID') ?>

    <?= $form->field($model, 'Date') ?>

    <?= $form->field($model, 'Time') ?>

    <?= $form->field($model, 'Vendor_1') ?>

    <?php // echo $form->field($model, 'Vendor_2') ?>

    <?php // echo $form->field($model, 'Vendor_3') ?>

    <?php // echo $form->field($model, 'Vendor_4') ?>

    <?php // echo $form->field($model, 'Vendor_5') ?>

    <?php // echo $form->field($model, 'Vendor_6') ?>

    <?php // echo $form->field($model, 'Vendor_7') ?>

    <?php // echo $form->field($model, 'Vendor_8') ?>

    <?php // echo $form->field($model, 'Vendor_9') ?>

    <?php // echo $form->field($model, 'Vendor_10') ?>

    <?php // echo $form->field($model, 'Vendor_11') ?>

    <?php // echo $form->field($model, 'Vendor_12') ?>

    <?php // echo $form->field($model, 'Vendor_13') ?>

    <?php // echo $form->field($model, 'Vendor_14') ?>

    <?php // echo $form->field($model, 'Vendor_15') ?>

    <?php // echo $form->field($model, 'Vendor_16') ?>

    <?php // echo $form->field($model, 'Vendor_17') ?>

    <?php // echo $form->field($model, 'Vendor_18') ?>

    <?php // echo $form->field($model, 'Vendor_19') ?>

    <?php // echo $form->field($model, 'Vendor_20') ?>

    <?php // echo $form->field($model, 'Combine') ?>

    <?php // echo $form->field($model, 'Winter_Gear_Night') ?>

    <?php // echo $form->field($model, 'Combine_Pre') ?>

    <?php // echo $form->field($model, 'Skip') ?>

    <?php // echo $form->field($model, 'Cancelled') ?>

    <?php // echo $form->field($model, 'Deals_ID') ?>

    <?php // echo $form->field($model, 'Give_Away_ID') ?>

    <?php // echo $form->field($model, 'In_Store_Deal_ID') ?>

    <?php // echo $form->field($model, 'Vendor_Images_1') ?>

    <?php // echo $form->field($model, 'Vendor_Images_2') ?>

    <?php // echo $form->field($model, 'Vendor_Images_3') ?>

    <?php // echo $form->field($model, 'Vendor_Images_4') ?>

    <?php // echo $form->field($model, 'Vendor_Images_5') ?>

    <?php // echo $form->field($model, 'Vendor_Images_6') ?>

    <?php // echo $form->field($model, 'Vendor_Images_7') ?>

    <?php // echo $form->field($model, 'Vendor_Images_8') ?>

    <?php // echo $form->field($model, 'Vendor_Images_9') ?>

    <?php // echo $form->field($model, 'Vendor_Images_10') ?>

    <?php // echo $form->field($model, 'Join_US_ID') ?>

    <?php // echo $form->field($model, 'Rim_Strip_Toss') ?>

    <?php // echo $form->field($model, 'Helmet_Toss') ?>

    <?php // echo $form->field($model, 'Activities_1') ?>

    <?php // echo $form->field($model, 'Activities_2') ?>

    <?php // echo $form->field($model, 'Activities_3') ?>

    <?php // echo $form->field($model, 'Activities_4') ?>

    <?php // echo $form->field($model, 'Food_Refreshments') ?>

    <?php // echo $form->field($model, 'Now_Hiring') ?>

    <?php // echo $form->field($model, 'Activities_URL') ?>

    <?php // echo $form->field($model, 'Reschedule_Date_If_Cancelled') ?>

    <?php // echo $form->field($model, 'Activities3_URL') ?>

    <?php // echo $form->field($model, 'Special_Event') ?>

    <?php // echo $form->field($model, 'End_Date') ?>

    <?php // echo $form->field($model, 'Event_Type_ID') ?>

    <div class="form-group">
		<div class="col-sm-offset-3 col-sm-8">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
