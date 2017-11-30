<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\alert\AlertBlock;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <?php
        echo AlertBlock::widget([
            'type' => AlertBlock::TYPE_GROWL,
            'useSessionFlash' => true
        ]);
    ?>
<div class="panel panel-success" >

    <div class="panel-heading">
        <div class="panel-title"><h1 class="margin0px"><?= Html::encode($this->title) ?></h1></div>
        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="<?php echo Yii::$app->urlManager->createUrl(['userinfo/forgetpassword']);?>">Forgot password?</a></div>
    </div>     


   <div class="panel-body" >

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>      

        <div class="form-group">
            <div class="col-lg-offset-0 col-lg-12">
                <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>

</div>

</div>
