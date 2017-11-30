<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* use yii\helpers\ArrayHelper; */

/* @var $this yii\web\View */
/* @var $model app\models\BikeeventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bike-events-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
		'layout' => 'horizontal',
        'method' => 'get',
		'options' => ['class'=>'form well well-sm'],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'event_template_titles') ?>

    <?= $form->field($model, 'start_date') ?>

    <?= $form->field($model, 'end_date') ?>

    <?= $form->field($model, 'eventTime') ?>

    <?php // echo $form->field($model, 'eventTypeId') ?>

    <?php // echo $form->field($model, 'join_us_id') ?>

    <?php // echo $form->field($model, 'food_refreshments_id') ?>

    <?php // echo $form->field($model, 'give_away_id') ?>

    <?php // echo $form->field($model, 'in_store_deal_id') ?>

    <?php // echo $form->field($model, 'deals_id') ?>

    <div class="form-group">
		<div class="col-sm-offset-3 col-sm-8">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
