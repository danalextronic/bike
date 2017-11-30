<?php

use app\models\Vendor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    <div class="panel panel-info">
        <div class="panel-heading">
            <strong>Add Vendor</strong>
        </div>
        <div class="panel-body">
            <?= Html::dropDownList('vendor_name', null, ArrayHelper::map(Vendor::find()->all(), 'id', 'name'),
                [
                    'class' => 'form-control',
                    'id' => 'vendor-name', 'prompt' => 'Select Vendor',
                    'onChange' => 'setVendorValue(this)',
                ]) ?>
        </div>
    </div>

<script>

    function setVendorValue(e) {
        var vendor_id = parseInt($(e).val());
        var data = {
            vendor_id: vendor_id
        };
        var alreadyAdded = false;
        var addedVendors = $('.vendor-item');
        addedVendors.each(function (i, el) {
            var id = parseInt($(el).data('id'));
            if (vendor_id === id) {
                alreadyAdded = true;
                return false;
            }
        });

        if (vendor_id) {
            if (!alreadyAdded) {
                $.ajax({
                    url: '<?php echo Yii::$app->request->baseUrl. '/vendor/set-vendor-value' ?>',
                    type: 'post',
                    data: data,
                    success: function (data) {
                        $('.vendor-fields').append(data);
                        $(document).scrollTop( $("#vendor-"+vendor_id).offset().top);
                    }
                });
            } else {
                $(document).scrollTop( $("#vendor-"+vendor_id).offset().top);
            }
        }

    }
</script>
