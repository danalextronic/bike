<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Store;

/* @var $this yii\web\View */
/* @var $model app\models\StoreZip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-zip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'store_id')->dropDownList(ArrayHelper::map(Store::find()->all(),'Store_ID','Store_Name'),['prompt'=>"Please select a store"]) ?>

    <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true, 'placeholder' => 'comma-separated']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
