<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Userinfo */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Registration';
?>

<div class="userinfo-form">


<h1 class="margin0px colorBlue"><?= Html::encode($this->title) ?></h1>
<hr class="customHR"/>

<?php
    foreach(Yii::$app->session->getAllFlashes() as $key => $message)
    {
        echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
    } 
?>
    <?php $form = ActiveForm::begin(['options'=>['class' => 'well well-sm','enctype'=>'multipart/form-data']]); ?>
	<?= $form->errorSummary($model); ?>
	
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>	
    </div>

    <?php ActiveForm::end(); ?>

</div>
