<?php

use app\models\Userinfo;
use app\models\DealBrand;
use app\models\PercentOff;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$userTypeId = !isset($userTypeId) ? Yii::$app->user->identity->userTypeId : $userTypeId;
?>

    <div class="brand-section" id="section-<?= $counter ?>">
        <div class="panel panel-default">
            <div class="panel-heading">Brand # <?= $counter ?></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-sm">
                            <?= Html::label("Brand Name", 'brand-name', ['class' => 'control-label']) ?>
                            <?= Html::textInput('Brand[' . $counter . '][brand_name]', $model->Deal_Brand, ['class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-sm">
                            <?php if ($model->Deal_Brand_ID) : ?>

                                <div class="panel panel-default">
                                    <div class="panel-heading"><strong>Brand Value As</strong></div>
                                    <div class="panel-body">
                                        <?= Html::dropDownList('percent_off', null, ArrayHelper::map(PercentOff::find()->all(), 'Percent_Off_ID', 'Percent_Off'),
                                            [
                                                'class' => 'form-control',
                                                'id' => 'existing-brand', 'prompt' => 'Select PercentOff',
                                                'onChange' => 'setPercentValue(this)'
                                            ])
                                        ?>
                                        <span>Or</span>
                                        <?= Html::dropDownList('percent_off_image', null, ArrayHelper::map(PercentOff::find()->all(), 'Percent_Off_ID', 'Percent_Off_Image'),
                                            [
                                                'class' => 'form-control',
                                                'id' => 'existing-brand', 'prompt' => 'Select PercentOff Image',
                                                'onChange' => 'setPercentValue(this)'
                                            ])
                                        ?>
                                    </div>
                                </div>


                                <?= Html::label("Brand Value", 'brand-value', ['class' => 'control-label']) ?>
                                <?= Html::textInput('Brand[' . $counter . '][brand_value]', $model->Deal_Brand_Value, ['class' => 'form-control brand_value']); ?>

                            <?php else :?>
                                <div class="panel panel-default">
                                    <div class="panel-heading"><strong>Brand Value As</strong></div>
                                    <div class="panel-body">
                                        <?= Html::dropDownList('percent_off', null, ArrayHelper::map(PercentOff::find()->all(), 'Percent_Off_ID', 'Percent_Off'),
                                            [
                                                'class' => 'form-control',
                                                'id' => 'existing-brand', 'prompt' => 'Select PercentOff',
                                                'onChange' => 'setPercentValue(this)'
                                            ])
                                        ?>
                                        <span>Or</span>
                                        <?= Html::dropDownList('percent_off_image', null, ArrayHelper::map(PercentOff::find()->all(), 'Percent_Off_ID', 'Percent_Off_Image'),
                                            [
                                                'class' => 'form-control',
                                                'id' => 'existing-brand', 'prompt' => 'Select PercentOff Image',
                                                'onChange' => 'setPercentValue(this)'
                                            ])
                                        ?>
                                    </div>
                                </div>
                                <?= Html::label("Brand Value", 'brand-value', ['class' => 'control-label']) ?>
                                <?= Html::textInput('Brand[' . $counter . '][brand_value]', "", ['class' => 'form-control brand_value']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-sm">
                            <?= Html::label("Brand Image", 'brand-image', ['class' => 'control-label']) ?>
                            <?= Html::textInput('Brand[' . $counter . '][brand_image]', $model->Deal_Brand_Image, ['class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>
		<div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group-sm">
                            <?= Html::label("Brand Incentive", 'brand-incentive', ['class' => 'control-label']) ?>
                            <?= Html::textInput('Brand[' . $counter . '][brand_incentive]', $model->Deal_Brand_Incentive, ['class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>
                <?= Html::hiddenInput('Brand[' . $counter . '][brand_id]', $model->Deal_Brand_ID, ['class' => 'form-control']); ?>
                <?= Html::button('Remove Brand', ['class' => 'btn btn-warning', 'data-brand-id'=>$model->Deal_Brand_ID, 'onClick' => 'removeBrand(this)']); ?>
            </div>
        </div>
    </div>
<script>

    function setPercentValue(e) {
        var percent_id = parseInt($(e).val());
        var parent = $(e).closest(".brand-section");
        if (percent_id) {
            var percent_title = $(e).find("option:selected").text();
            parent.find('#percent_off_id').val(percent_id);
            parent.find('.brand_value').val(percent_title);
        } else {
            parent.find('#percent_off_id').val("");
            parent.find('#brand_value').val("");
        }
    }
</script>
