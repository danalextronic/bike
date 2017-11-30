<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Usertype;
use app\models\Store;

/* @var $this yii\web\View */
/* @var $model app\models\UserinfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
		'layout' => 'horizontal',
        'method' => 'get',
		'options' => ['class'=>'form well well-sm'],
    ]); ?>

    <?= $form->field($model, 'userId') ?>

    <?= $form->field($model, 'username') ?>

    <? //= $form->field($model, 'password') ?>

    <?= $form->field($model, 'fullName') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'userTypeId')->dropDownList(ArrayHelper::map(Usertype::find()->all(),'userTypeId','typeName'),['prompt'=>"Please Select"]) ?>

    <?= $form->field($model, 'storeId')->dropDownList(ArrayHelper::map(Store::find()->all(),'Store_ID','Store_Name'),['prompt'=>"Please Select"]) ?>


    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'lastVisitedOn') ?>

    <?php // echo $form->field($model, 'lastVisitedIP') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'createdOn') ?>

    <?php // echo $form->field($model, 'createdIP') ?>

    <?php // echo $form->field($model, 'lastEditedBy') ?>

    <?php // echo $form->field($model, 'lastEditedOn') ?>

    <?php // echo $form->field($model, 'lastEditedIP') ?>

    <div class="form-group">
		<div class="col-sm-offset-3 col-sm-8">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
