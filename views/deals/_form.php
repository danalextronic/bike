<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

use app\models\DealBrand;
use app\models\PercentOff;
use app\models\Joinus;
use app\models\DealImage;

/* @var $this yii\web\View */
/* @var $model app\models\Deals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deals-form">

    <?php $form = ActiveForm::begin(['options'=>['class' => 'well well-sm','enctype'=>'multipart/form-data']]); ?>
	 <?= $form->errorSummary($model); ?>
	
    <?= $form->field($model, 'Deal_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Join_US_ID')->dropDownList(ArrayHelper::map(Joinus::find()->all(),'Join_US_ID','Join_US'),['prompt'=>"Please Select"]) ?>

    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true]) ?>

    <?= Html::hiddenInput('deal_id', $model->Deals_ID, ['id' => 'deal_id']); ?>

    <label>Already loaded images</label>
    <ul class="loaded-images">
        <?php
        if (!$model->isNewRecord && isset($images)) {
            foreach ($images as $image) {
                echo $this->render('/deal-image/_render_image', [
                    'image' => $image,
                ]);
            }
        }
        ?>
    </ul>

    <?= Html::button('Add New Brand', ['class'=>'add-brands btn btn-success', 'id'=>'add-brands'])?>
    <span>Or Choose an Existing Brand</span>

    <div class="row">
        <div class="col-sm-5 existing-brand">
            <?= Html::dropDownList('existing_brand', null, ArrayHelper::map(DealBrand::find()->all(), 'Deal_Brand_ID', 'Deal_Brand'),
                [
                    'class' => 'form-control',
                    'id' => 'existing-brand', 'prompt' => 'Select Brand',
                    'onChange' => 'setBrandValue(this)'])
            ?>
        </div>
    </div>


    <div class="existing-brand"></div>
    <ul class="choose-brand">

        <?php
            if (!$model->isNewRecord && isset($brands_with_percents)) {
                $counter = 1;
                foreach ($brands_with_percents as $current) {
                    echo "<li class='one-brand'>";
                    echo $this->render('/deals-brand/_render_brand_fields', [
                        'model' => $current->dealsBrand,
                        'counter' => $counter,
                    ]);
                    $counter++;
                    echo '</li>';
                }
            }
        ?>

    </ul>
    <?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger">
        <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
		&nbsp;
		<?= Html::submitButton($model->isNewRecord ? 'Create & go back to manage' : 'Update & go back to manage', ['name'=>'back_manage','value'=>1,'class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    function deleteBrand (e) {
        e.preventDefault();
        $(this).closest('li').remove();
        return false;
    }
    var counter = 0;

    $(function () {
        function deleteImage(e) {
            e.preventDefault();
            e.stopPropagation();
            var image = this;
            var id = $(this).data('imageid');
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl. '/deal-image/dynamic-deleting' ?>',
                type: 'post',
                data: {
                    id: id
                },
                success: function (data) {
                    $(image).find('img').remove();
                    $(image).remove();
                }
            });
            return false;
        }

        $('.choose-brand').on('click', '.delete-brand', deleteBrand);
        $('.loaded-images').on('click', '.delete-image', deleteImage);

        counter = $('li.one-brand') ? $('li.one-brand').length : 0;
        $('#add-brands').on('click', function (e) {
            e.preventDefault();
            counter++;
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl. '/deals-brand/render-brand' ?>',
                type: 'post',
                data: {counter: counter},
                success: function (data) {
                    var html = $('<li class="one-brand"></li>').append(data);
                    $('.choose-brand').append(html);
                    $('.choose-brand').on('click', '.delete-brand', deleteBrand);
                }
            });
            return false;
        });

    });

    function setBrandValue(e) {
        var brand_id = parseInt($(e).val());
        counter = $('li.one-brand') ? $('li.one-brand').length : 0;
        counter++;
        var data = {
            brand_id: brand_id,
            counter: counter
        };
        if (brand_id) {
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl. '/deals-brand/set-brand-value' ?>',
                type: 'post',
                data: data,
                success: function (data) {
                    var html = $('<li class="one-brand"></li>').append(data);
                    $('.choose-brand').append(html);
                    $('.choose-brand').on('click', '.delete-brand', deleteBrand);
                }
            });
        }
    }
    function removeBrand(e) {
        var brand_id = $(e).attr('data-brand-id');

        var data = {
            brand_id: brand_id
        };
        var parent =  $(e).closest(".brand-section");
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/deals/dynamic-deleting' ?>',
            type: 'post',
            data: data,
            success: function (data) {
                parent.remove();
            }
        })/*.then(vendorHandler)*/;
    }

</script>
