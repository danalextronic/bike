<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* use yii\helpers\ArrayHelper; */

/* @var $this yii\web\View */
/* @var $model app\models\HiringSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hiring-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
		'layout' => 'horizontal',
        'method' => 'get',
		'options' => ['class'=>'form well well-sm'],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bike_events_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'position_1') ?>

    <?= $form->field($model, 'position_1_link') ?>

    <?php // echo $form->field($model, 'position_2') ?>

    <?php // echo $form->field($model, 'position_2_link') ?>

    <?php // echo $form->field($model, 'position_3') ?>

    <?php // echo $form->field($model, 'position_3_link') ?>

    <?php // echo $form->field($model, 'position_4') ?>

    <?php // echo $form->field($model, 'position_4_link') ?>

    <?php // echo $form->field($model, 'position_5') ?>

    <?php // echo $form->field($model, 'position_5_link') ?>

    <?php // echo $form->field($model, 'position_6') ?>

    <?php // echo $form->field($model, 'position_6_link') ?>

    <div class="form-group">
		<div class="col-sm-offset-3 col-sm-8">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
