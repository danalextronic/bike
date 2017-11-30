<?php

use app\models\Activities;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


    <div class="panel panel-info">
        <div class="panel-heading">
            <strong>Add Activity</strong>
        </div>
        <div class="panel-body">
            <?= Html::dropDownList('activity_name', null, ArrayHelper::map(Activities::find()->all(), 'Activities_ID', 'Activities'),
                [
                    'class' => 'form-control',
                    'id' => 'activity-name', 'prompt' => 'Select Activity',
                    'onChange' => 'setActivityValue(this)',
                ]) ?>
        </div>
    </div>


<script>

    function setActivityValue(e) {
        var activity_id = parseInt($(e).val());
        var data = {
            activity_id: activity_id
        };
        var alreadyAdded = false;
        var addedActivities = $('.activity-item');
        addedActivities.each(function (i, el) {
            var id = parseInt($(el).data('id'));
            if (activity_id === id) {
                alreadyAdded = true;
                return false;
            }
        });
        if (activity_id) {
            if (!alreadyAdded) {
                $.ajax({
                    url: '<?php echo Yii::$app->request->baseUrl. '/activities/set-activity-value' ?>',
                    type: 'post',
                    data: data,
                    success: function (data) {
                        $('.activity-fields').append(data);
                        $(document).scrollTop( $("#activity-"+activity_id).offset().top);
                    }
                });
            } else {
                $(document).scrollTop( $("#activity-"+activity_id).offset().top);
            }
        }

    }


</script>
