<?php

use app\models\PercentOff;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>


    <div class="percent-section">
        <?= Html::dropDownList('Brand['.$counter.'][percent_name]', null, ArrayHelper::map(PercentOff::find()->all(), 'Percent_Off_ID', 'Percent_Off'),
            [
                'class' => 'form-control',
                'id' => 'brand-name', 'prompt' => 'Select Percent off',
                /*'onChange' => 'setPercentOffValue(this)',*/
            ]) ?>
    </div>
