<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StoreSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Store_ID') ?>

    <?= $form->field($model, 'Store') ?>

    <?= $form->field($model, 'Store_Name') ?>

    <?= $form->field($model, 'Address_1') ?>

    <?= $form->field($model, 'Address_2') ?>

    <?= $form->field($model, 'Url') ?>

    <?php // echo $form->field($model, 'City') ?>

    <?php // echo $form->field($model, 'State') ?>

    <?php // echo $form->field($model, 'Zip') ?>

    <?php // echo $form->field($model, 'Phone') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
