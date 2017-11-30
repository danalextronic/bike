<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* use yii\helpers\ArrayHelper; */

/* @var $this yii\web\View */
/* @var $model app\models\Db2RidersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="db2-riders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
		'layout' => 'horizontal',
        'method' => 'get',
		'options' => ['class'=>'form well well-sm'],
    ]); ?>

    <?= $form->field($model, 'Rider_Name') ?>

    <?= $form->field($model, 'RacerID') ?>

    <?= $form->field($model, 'AMA_Num') ?>

    <?= $form->field($model, 'Client_ID') ?>

    <?= $form->field($model, 'Count_Coupons_Issued') ?>

    <?php // echo $form->field($model, 'Count_First_Place') ?>

    <?php // echo $form->field($model, 'Count_Races_Completed') ?>

    <?php // echo $form->field($model, 'Stores_ID') ?>

    <?php // echo $form->field($model, 'Coupon_ID') ?>

    <?php // echo $form->field($model, 'Last_Update') ?>

    <?php // echo $form->field($model, 'Riders_ID') ?>

    <?php // echo $form->field($model, 'Coupon_Limit') ?>

    <?php // echo $form->field($model, 'Rider_Category_ID') ?>

    <?php // echo $form->field($model, 'Create_Date') ?>

    <?php // echo $form->field($model, 'Results_To_Process') ?>

    <?php // echo $form->field($model, 'Address') ?>

    <?php // echo $form->field($model, 'Address_2') ?>

    <?php // echo $form->field($model, 'City') ?>

    <?php // echo $form->field($model, 'State') ?>

    <?php // echo $form->field($model, 'Zip') ?>

    <?php // echo $form->field($model, 'Rider_Age') ?>

    <?php // echo $form->field($model, 'Shirt_Size') ?>

    <?php // echo $form->field($model, 'MSF_ID') ?>

    <?php // echo $form->field($model, 'MSF_Expiration') ?>

    <?php // echo $form->field($model, 'Approved') ?>

    <?php // echo $form->field($model, 'Welcome_Packet_Sent') ?>

    <?php // echo $form->field($model, 'Email_Address') ?>

    <?php // echo $form->field($model, 'Phone_Number') ?>

    <div class="form-group">
		<div class="col-sm-offset-3 col-sm-8">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
