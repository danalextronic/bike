<?php

use app\models\Userinfo;
use app\models\Activities;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$userTypeId = !isset($userTypeId) ? Yii::$app->user->identity->userTypeId : $userTypeId;
?>

<div class="row ">
    <div class="panel panel-info activity-item" id="activity-<?= $activity->Activities_ID ?>" data-activity="<?= $activity->Activities?>" data-id="<?= $activity->Activities_ID?>">
        <div class="panel-heading">
            <strong>Activity Name: <?= $activity->Activities ?></strong>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-sm">
                        <?= Html::label("Activity Name", 'activity-name', ['class' => 'control-label']) ?>
                        <?= Html::textInput('Activity['.$activity->Activities_ID.'][activity_name]', $activity->Activities, ['class' => 'form-control', 'disabled'=> $disabled]); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-sm">
                        <?= Html::label("Activity Image", 'activity-image', ['class' => 'control-label']) ?>
                        <?= Html::textInput('Activity['.$activity->Activities_ID.'][activity_image]', $activity->Activities_Image, ['class' => 'form-control', 'disabled'=> $disabled]); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-sm">
                        <?= Html::label("Hyperlink", 'activity-hyperlink', ['class' => 'control-label']) ?>
                        <?= Html::textInput('Activity['.$activity->Activities_ID.'][activity_hyperlink]', $activity->Hyperlink, ['class' => 'form-control', 'disabled'=> $disabled]); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php  if(!$disabled) : ?>
                        <?= Html::button('Remove Activity', ['class' => 'btn btn-warning', 'data-activity-id'=>$activity->Activities_ID, 'onClick' => 'removeActivity(this)']); ?>
                    <?php endif; ?>
                </div>
            </div>
            <?= Html::hiddenInput('Activity['.$activity->Activities_ID.'][activity_id]', $activity->Activities_ID, ['class' => 'form-control']); ?>
        </div>
    </div>
</div>