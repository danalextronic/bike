<?php

use app\models\HiringPositions;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$userTypeId = !isset($userTypeId) ? Yii::$app->user->identity->userTypeId : $userTypeId;
?>

<div class="position-section">
    <?= Html::textInput('Position['.$counter.'][position_name]', $model->name, [
        'class' => 'form-control',
    ]); ?>
    <?= Html::textInput('Position['.$counter.'][position_link]', $model->link, [
        'class' => 'form-control',
    ]); ?>
</div>