<?php

use app\models\Deals;
use app\models\GiveAway;
use app\models\InStoreDeal;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\EventType;
use app\models\Joinus;
use app\models\FoodRefreshments;

use app\models\Userinfo;
use app\models\Store;
use app\models\Activities;

use kartik\select2\Select2;
use kartik\date\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;
use kartik\switchinput\SwitchInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\BikeEvents */
/* @var $form yii\widgets\ActiveForm */
?>

 <?php
        $userTypeId = Yii::$app->user->identity->userTypeId;
        $readOnly = ['readOnly'=>false];
        $disabled = false;
        $read=false;
        if($userTypeId == Userinfo::MANAGER_USER_TYPE_ID)
        {
            $readOnly = ['readOnly'=>true];
            $disabled = 'disabled';
            $read=true;
        }
?>

<div class="bike-events-form">

    <?php $form = ActiveForm::begin(['fieldConfig'=>['options'=>['class'=>'form-group form-group-sm']],'layout' => 'default','options'=>['class' => 'well well-sm','enctype'=>'multipart/form-data']]); ?>
	
    <?= $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'eventTypeId')->dropDownList(ArrayHelper::map(EventType::find()->all(),'Event_Type_ID','Event_Type'),['prompt'=>"Please Select",'disabled'=>$disabled]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'event_template_titles')->textInput(['maxlength' => true,'readonly'=>$read]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
                
                <?php
                echo $form->field($model, 'start_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'yyyy-mm-dd', 'disabled'=>$disabled],
                 'removeButton' => false,
                 'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose'=>true,
                     'format' => 'yyyy-mm-dd',

                ]
            ]);
            ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'event_start_time')->widget(DateTimePicker::className(), [
                'options' => ['disabled'=>$disabled],
                'language' => 'en',
                'size' => 'ms',
                'template' => '{input}',

                'pickButtonIcon' => 'glyphicon glyphicon-time',
                'inline' => false,
                'clientOptions' => [
                    'startView' => 1,
                    'minView' => 0,
                    'maxView' => 1,
                    'autoclose' => true,
                    //'linkFormat' => 'HH:ii P', // if inline = true
                    'format' => 'HH:ii P', // if inline = false
                    'todayBtn' => true
                ]
            ]);?>

        </div>

        <div class="col-sm-3">

                <?php
                echo $form->field($model, 'end_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'yyyy-mm-dd', 'disabled'=>$disabled],
                 'removeButton' => false,
                 'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose'=>true,
                     'format' => 'yyyy-mm-dd',

                ]
            ]);
            ?>
        </div>

        <div class="col-sm-3">

            <?= $form->field($model, 'event_end_time')->widget(DateTimePicker::className(), [
                'options' => ['disabled'=>$disabled],
                'language' => 'en',
                'size' => 'ms',
                'template' => '{input}',
                'pickButtonIcon' => 'glyphicon glyphicon-time',
                'inline' => false,
                'clientOptions' => [
                    'startView' => 1,
                    'minView' => 0,
                    'maxView' => 1,
                    'autoclose' => true,
                    //'linkFormat' => 'HH:ii P', // if inline = true
                    'format' => 'HH:ii P', // if inline = false
                    'todayBtn' => true
                ]
            ]);?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-6"><?= $form->field($model, 'join_us_id')->dropDownList(ArrayHelper::map(Joinus::find()->all(),'Join_US_ID','Join_US'),['prompt'=>"Please Select",'disabled'=>$disabled]) ?></div>
        <div class="col-sm-6"><?= $form->field($model, 'food_refreshments_id')->dropDownList(ArrayHelper::map(FoodRefreshments::find()->all(),'Food_Refreshments_ID','Food_Refreshments'),['prompt'=>"Please Select",'disabled'=>$disabled]) ?></div>
    </div>

    <div class="row">
        <div class="col-sm-4"><?= $form->field($model, 'give_away_id')->dropDownList(ArrayHelper::map(GiveAway::find()->all(),'Give_Away_ID','Give_Away'),['prompt'=>"Please Select",'disabled'=>$disabled]) ?></div>
        <div class="col-sm-4"><?= $form->field($model, 'in_store_deal_id')->dropDownList(ArrayHelper::map(InStoreDeal::find()->all(),'In_Store_Deal_ID','In_Store_Deal'),['prompt'=>"Please Select",'disabled'=>$disabled]) ?></div>
        <div class="col-sm-4"><?= $form->field($model, 'deals_id')->dropDownList(ArrayHelper::map(Deals::find()->all(),'Deals_ID','Deal_Name'),['prompt'=>"Please Select",'disabled'=>$disabled]) ?></div>
    </div>

    <?php
        echo $form->field($model, 'StoreIds')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Store::find()->all(), 'Store_ID', 'Store_Name'),
            'options' => ['placeholder' => 'Select Store', 'multiple' => true, 'disabled' => $disabled]
        ]);
    ?>

    <?= Html::hiddenInput('event_id', $model->id, ['id' => 'event_id']); ?>

    <div class="row">
        <div class="chooser">
            <div class="choose-button choose-vendor">
                <?= Html::button('Add Vendor', ['class'=>'btn btn-success', 'id'=>'add-vendor'])?>
            </div>
            <div class="choose-button choose-activity">
                <?= Html::button('Add Activity', ['class'=>'btn btn-success', 'id'=>'add-activity'])?>
            </div>
        </div>

        <div class="vendors-activities">
            <div class="vendor-fields">
                <?php
                if (!$model->isNewRecord && isset($vendors)) {
                    foreach ($vendors as $vendor) {
                        echo $this->render('/vendor/_render_vendor_fields', [
                            'vendor' => $vendor,
                            'disabled' => $disabled,
                        ]);
                    }
                }
                ?>
            </div>
            <div class="activity-fields">
                <?php
                if (!$model->isNewRecord && isset($activities)) {
                    foreach ($activities as $activity) {
                        echo $this->render('/activities/_render_activity_fields', [
                            'activity' => $activity,
                            'disabled' => $disabled,
                        ]);
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php
        if(!$model->isNewRecord && $userTypeId == Userinfo::ADMIN_USER_TYPE_ID)
        {
            echo $form->field($model, 'approved')->dropDownList(['1'=>'Yes','0'=>'No']);
        }
    ?>
    <div class="row">
        <div class="col-sm-6">
            <?php if (!$model->isNewRecord) {
                echo $form->field($model, 'is_archive')->widget(SwitchInput::classname(), [
                    'type' => SwitchInput::CHECKBOX
                ]);
            }
            ?>
        </div>
    </div>

    <div class="form-group">
        <?php if ($userTypeId == Userinfo::ADMIN_USER_TYPE_ID) : ?>
            <?php if ($model->isNewRecord): ?>
                <?= Html::submitButton('Create', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
                &nbsp;
                <?= Html::submitButton('Create & go back to manage', ['name' => 'back_manage', 'value' => 1, 'class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
            <?php elseif($model->is_changed == 1): ?>
                  <?= Html::submitButton('Publish', ['class' => 'btn btn-primary']) ?>
                  <?= Html::submitButton('Publish & go back to manage', ['class' => 'btn btn-primary']) ?>
            <?php else: ?>
                <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
                <?= Html::submitButton('Update & go back to manage', ['class' => 'btn btn-primary']) ?>
            <?php endif; ?>
        <?php else :?>
            <?= Html::submitButton('Submit for Review', ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>

        </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    var vendorHandler = function (e) {
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/vendor/render-vendor' ?>',
            type: 'post',
            data: [],
            success: function (data) {
                $('.choose-vendor').html(data);
            }
        });
        return false;
    };

    var activityHandler = function (e) {
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/activities/render-activity' ?>',
            type: 'post',
            data: [],
            success: function (data) {
                $('.choose-activity').html(data);
            }
        });
        return false;
    };

    $(document).ready(function() {
        $('#add-vendor').on('click', vendorHandler);

        $('#add-activity').on('click', activityHandler);

        $('button[type="submit"]').on('click', function () {
           $("#bikeevents-storeids").attr("disabled", false);
            $('.vendor-item .form-control').each(function (i, el) {
                $(el).attr("disabled", false);
            });
            $('.activity-item .form-control').each(function (i, el) {
                $(el).attr("disabled", false);
            });
        });
    });

    function removeVendor(e) {
        var vendor_id = $(e).attr('data-vendor-id');
        var event_id = $("#event_id").val();
        var data = {
            event_id: event_id
        };
/*        var name = $('#vendor-' + vendor_id).data('vendor');
        $('#vendor-name').append(
            $('<option></option>').val(vendor_id).html(name)
        );*/
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/vendor/dynamic-deleting' ?>',
            type: 'post',
            data: data,
            success: function (data) {
                $('#vendor-'+vendor_id).remove();
            }
        })/*.then(vendorHandler)*/;
    }

    function removeActivity(e) {
        var activity_id = $(e).attr('data-activity-id');
        var event_id = $("#event_id").val();
        var data = {
            event_id: event_id
        };
/*        var name = $('#activity-' + activity_id).data('activity');
        $('#activity-name').append(
            $('<option></option>').val(activity_id).html(name)
        );*/
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/activities/dynamic-deleting' ?>',
            type: 'post',
            data: data,
            success: function (data) {
                $('#activity-'+activity_id).remove();
            }
        })/*.then(activityHandler)*/;
    }
</script>
