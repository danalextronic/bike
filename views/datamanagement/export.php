<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\BikeNightTemplate */

$this->title = 'Search & Export';
$this->params['breadcrumbs'][] = ['label' => 'Import', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="bike-night-template-create">

    <h1 class="margin0px colorBlue"><?= Html::encode($this->title) ?></h1>

	<?php $form = ActiveForm::begin(['options'=>['class' => 'well well-sm','enctype'=>'multipart/form-data']]); ?>
	<?= $form->errorSummary($model); ?>
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Customers Date</h4></div>
        <div class="panel-body panel-default">
            <?=
            $form->field($model, 'customerDate')->radioList(
                [0 => 'Include Shopper based on Last Purchase', 1 => 'Include Shopper based on Last Activity', 2 => 'Select # of days from last'],
                [
                    'item' => function ($index, $label, $name, $checked, $value) {
                        $return = '<label class="modal-radio">';
                        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3">';
                        $return .= '<span>' . ucwords($label) . '</span>';
                        $return .= '</label>';

                        return $return;
                    }
                ]
            )->label(false);
            ?>
        </div>
    </div>

    <?= $form->field($model, 'activityDate')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'yyyy-mm-dd'],
        'removeButton' => false,
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',

        ]
    ]);
    ?>

    <?= $form->field($model, 'numOfDays')->textInput(['disabled'=>true]) ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h4>Customers Store</h4></div>
        <div class="panel-body panel-default">
            <?=
            $form->field($model, 'customerStore')->radioList(
                [0 => 'Original Store Code', 1 => 'Last Purchased Store', 2 => 'Both'],
                [
                    'item' => function ($index, $label, $name, $checked, $value) {

                        $return = '<label class="modal-radio">';
                        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3">';
                        $return .= '<i></i>';
                        $return .= '<span>' . ucwords($label) . '</span>';
                        $return .= '</label>';

                        return $return;
                    }
                ]
            )->label(false);
            ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Load', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    $(function () {
        var acDate = $('#datamanagement-activitydate');
        var numDays = $('#datamanagement-numofdays');
        $("input[name='Datamanagement[customerDate]']").click(function (e) {
           var dates = $(this).val();
            switch (dates) {
                case "0":
                case "1":
                    $(acDate).prop('disabled', false);
                    $(numDays).prop('disabled', true);
                    break;
                case "2":
                    $(acDate).prop('disabled', true);
                    $(numDays).prop('disabled', false);
                    break;
                default:
            }
        });
        $('input[type="submit"]').click(function (e) {
            $(numDays).prop('disabled', false);
        });



    });

</script>