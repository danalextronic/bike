<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\JoinUs;
use app\models\InStoreDeal;
use app\models\GiveAway;
use app\models\FoodRefreshments;
use app\models\Deals;
use app\models\Store;
use app\models\Eventtype;
use app\models\Activities;

use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\BikeNightTemplate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bike-night-template-form">

    <?php $form = ActiveForm::begin(['fieldConfig'=>[

'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-3',
            //'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-9',
            'error' => '',
            'hint' => '',
        ]

    ,'options'=>['class'=>'form-group form-group-sm']],'layout' => 'horizontal','options'=>['class' => 'well well-sm','enctype'=>'multipart/form-data']]); ?>
	 <?= $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'Bike_Night_ID')->textInput(['readonly'=>true,'disabled'=>true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'Cancelled')->checkBox() ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'Skip')->checkBox() ?>
        </div>
    </div>
	    
    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'Store_ID')->dropDownList(ArrayHelper::map(Store::find()->all(),'Store_ID','Store_Name'),['prompt'=>"Please Select"]) ?>
        </div>
        <div class="col-sm-2">
            <?//= $form->field($model, 'Date')->textInput() ?>

             <?php
                echo $form->field($model, 'Date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'yyyy-mm-dd'],
                 'removeButton' => false,
                 'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose'=>true,
                     'format' => 'yyyy-mm-dd'
                ]
            ]);
            ?>


        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'Time')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?//= $form->field($model, 'End_Date')->textInput() ?>
              <?php
                echo $form->field($model, 'End_Date',['labelOptions'=>['class'=>'input-sm col-sm-5'],'template'=>'{label}<div class="col-sm-7">{input}</div>'])->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'yyyy-mm-dd'],
                 'removeButton' => false,
                 'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose'=>true,
                     'format' => 'yyyy-mm-dd'
                ]
            ]);
            ?>

        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'Event_Type_ID',['labelOptions'=>['class'=>'input-sm col-sm-4'],'template'=>'{label}<div class="col-sm-8">{input}</div>'])->dropDownList(ArrayHelper::map(Eventtype::find()->all(),'Event_Type_ID','Event_Type'),['prompt'=>"Please Select"]) ?>
        </div>
    </div>

     <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Activities_1')->dropDownList(ArrayHelper::map(Activities::find()->all(),'Activities_ID','Activities'),['prompt'=>"Please Select"]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Activities_URL')->textInput(['maxlength' => true]) ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Activities_2')->dropDownList(ArrayHelper::map(Activities::find()->all(),'Activities_ID','Activities'),['prompt'=>"Please Select"]) ?>
        </div>
        <div class="col-sm-6">
            
        </div>        
    </div>
    

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Activities_3')->dropDownList(ArrayHelper::map(Activities::find()->all(),'Activities_ID','Activities'),['prompt'=>"Please Select"]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Activities3_URL')->textInput(['maxlength' => true]) ?>
        </div>        
    </div>
    
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Activities_4')->dropDownList(ArrayHelper::map(Activities::find()->all(),'Activities_ID','Activities'),['prompt'=>"Please Select"]) ?>
        </div>
        <div class="col-sm-6">
            
        </div>        
    </div>

    


<div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Join_US_ID')->dropDownList(ArrayHelper::map(Joinus::find()->all(),'Join_US_ID','Join_US'),['prompt'=>"Please Select"]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Food_Refreshments')->dropDownList(ArrayHelper::map(foodRefreshments::find()->all(),'Food_Refreshments_ID','Food_Refreshments'),['prompt'=>"Please Select"]) ?>
        </div>        
    </div>
    
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Give_Away_ID')->dropDownList(ArrayHelper::map(GiveAway::find()->all(),'Give_Away_ID','Give_Away'),['prompt'=>"Please Select"]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'In_Store_Deal_ID')->dropDownList(ArrayHelper::map(InStoreDeal::find()->all(),'In_Store_Deal_ID','In_Store_Deal'),['prompt'=>"Please Select"]) ?>
        </div>        
    </div>
    
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Deals_ID')->dropDownList(ArrayHelper::map(Deals::find()->all(),'Deals_ID','Deal_Name'),['prompt'=>"Please Select"]) ?>
        </div>
        <div class="col-sm-6">
            
        </div>        
    </div>
   
   <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_1')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_Images_1')->textInput() ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_2')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">            
        </div>        
    </div>

   
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_3')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_Images_2')->textInput() ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_4')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">            
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_5')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_Images_3')->textInput() ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_6')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">            
        </div>        
    </div>


    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_7')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_Images_4')->textInput() ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_8')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">            
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_9')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_Images_5')->textInput() ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_10')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">            
        </div>        
    </div>


    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_11')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_Images_6')->textInput() ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_12')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">            
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_13')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_Images_7')->textInput() ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_14')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">            
        </div>        
    </div>


    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_15')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_Images_8')->textInput() ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_16')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">            
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_17')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_Images_9')->textInput() ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_18')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">            
        </div>        
    </div>


    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_19')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_Images_10')->textInput() ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'Vendor_20')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">            
        </div>        
    </div>

<?php
/*
    <?= $form->field($model, 'Combine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Winter_Gear_Night')->textInput() ?>

    <?= $form->field($model, 'Combine_Pre')->textInput(['maxlength' => true]) ?>    

    <?= $form->field($model, 'Rim_Strip_Toss')->textInput() ?>

    <?= $form->field($model, 'Helmet_Toss')->textInput() ?>

    <?= $form->field($model, 'Now_Hiring')->textInput() ?>

    <?= $form->field($model, 'Reschedule_Date_If_Cancelled')->textInput() ?>

    <?= $form->field($model, 'Special_Event')->textInput() ?>

*/
    ?>
    

    <div class="form-group">

        <div class="col-sm-offset-1 col-sm-6">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    		&nbsp;
    		<?= Html::submitButton($model->isNewRecord ? 'Create & go back to manage' : 'Update & go back to manage', ['name'=>'back_manage','value'=>1,'class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
