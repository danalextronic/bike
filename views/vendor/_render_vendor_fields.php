<?php

use app\models\Userinfo;
use app\models\Vendor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$userTypeId = !isset($userTypeId) ? Yii::$app->user->identity->userTypeId : $userTypeId;
?>

<div class="row">
    <div class="panel panel-info vendor-item" id="vendor-<?= $vendor->id ?>" data-vendor="<?= $vendor->name?>" data-id="<?= $vendor->id?>">
        <div class="panel-heading">
            <strong>Vendor Name: <?= $vendor->name ?></strong>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-sm">
                        <?= Html::label("Vendor Url", 'vendor-url', ['class' => 'control-label']) ?>
                        <?= Html::textInput('Vendor['.$vendor->id.'][vendor_image_url]', $vendor->image_url, [
                            'class' => 'form-control',
                            'disabled'=> $disabled,
                        ]); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-sm">
                        <?= Html::label("Vendor Description", 'vendor-description', ['class' => 'control-label']) ?>
                        <?= Html::textarea('Vendor['.$vendor->id.'][vendor_description]', $vendor->description, ['class' => 'form-control', 'disabled'=> $disabled]); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php  if(!$disabled) : ?>
                        <?= Html::button('Remove Vendor', ['class' => 'btn btn-warning', 'data-vendor-id'=>$vendor->id, 'onClick' => 'removeVendor(this)']); ?>
                    <?php endif; ?>
                </div>
            </div>
            <?= Html::hiddenInput('Vendor['.$vendor->id.'][vendor_id]', $vendor->id, ['class' => 'form-control']); ?>
        </div>
    </div>
</div>
