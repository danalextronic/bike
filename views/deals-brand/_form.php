<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DealBrand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deal-brand-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Deal_Brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Deal_Brand_Image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>