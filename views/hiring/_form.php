<?php

use app\models\Store;
use kartik\select2\Select2;
use kartik\widgets\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Hiring */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hiring-form">

    <?php $form = ActiveForm::begin(['options'=>['class' => 'well well-sm','enctype'=>'multipart/form-data']]); ?>
	 <?= $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'bike_events_id')->dropDownList(ArrayHelper::map(\app\models\BikeEvents::find()->all(),'id','event_template_titles'),['prompt'=>"Please Select", 'id'=>'event-id']) ?>
        </div>
<!--        <div class="col-sm-6">
            <?php
/*            echo $form->field($model, 'date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'yyyy-mm-dd'],
                'removeButton' => false,
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                ]
            ]);
            */?>
        </div>-->
    </div>

    <div class="row">
        <div class="col-sm-12">
            <?php
                echo $form->field($model, 'StoreIds')->widget(DepDrop::classname(), [
                    'data' => ArrayHelper::map(Store::find()->all(),'Store_ID','Store_Name'),
                    'type' => DepDrop::TYPE_SELECT2,
                    'options'=>['multiple' => true],
                    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                    'pluginOptions'=>[
                        'depends'=>['event-id'],
                        'placeholder' => false,
                        'loading' => false,
                        'url'=>Url::to(['/hiring/dep-stores'])
                    ]
                ]);
            ?>
        </div>
    </div>
    <?= Html::button('Add new position', ['class'=>'add-positions btn btn-success', 'id'=>'add-positions'])?>
    <ul class="choose-position">
        <?php
        if (!$model->isNewRecord && isset($positions)) {
            $counter = 0;
            foreach ($positions as $position) {
                if(isset($position['hiringPositions'])){
                    echo $this->render('/hiring-positions/_render_position_fields', [
                        'position' => $position['hiringPositions'],
                        'counter' => $counter,
                    ]);
                    $counter++;
                }
            }
        }
        ?>
    </ul>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
		&nbsp;
		<?= Html::submitButton($model->isNewRecord ? 'Create & go back to manage' : 'Update & go back to manage', ['name'=>'back_manage','value'=>1,'class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    $(function () {
        function deletePosition (e) {
            e.preventDefault();
            $(this).closest('li').remove();
            return false;
        }

        $('.choose-position').on('click', '.delete-position', deletePosition);

        var counter = $('li.one-position') ? $('li.one-position').length - 1 : 0;
        $('#add-positions').on('click', function (e) {
            e.preventDefault();
            counter++;
            var positions = $.post('<?php echo Yii::$app->request->baseUrl. '/hiring-positions/render-position' ?>', {counter: counter});
            var deleteButton = '<a class="delete-position">X</a>';
            $.when(positions).done(function (positionsResponse) {
                var html = $('<li class="one-position"></li>').append(positionsResponse).append(deleteButton);
                $('.choose-position').append(html);
                $('.choose-position').on('click', '.delete-position', deletePosition);
            });
            return false;
        });
    });
</script>