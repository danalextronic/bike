<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* use yii\helpers\ArrayHelper; */

/* @var $this yii\web\View */
/* @var $model app\models\EventtypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
		'layout' => 'horizontal',
        'method' => 'get',
		'options' => ['class'=>'form well well-sm'],
    ]); ?>

    <?= $form->field($model, 'Event_Type_ID') ?>

    <?= $form->field($model, 'Event_Type') ?>

    <?= $form->field($model, 'Address_info') ?>

    <div class="form-group">
		<div class="col-sm-offset-3 col-sm-8">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
