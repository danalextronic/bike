<?php

use yii\helpers\Html;

$userTypeId = !isset($userTypeId) ? Yii::$app->user->identity->userTypeId : $userTypeId;
?>

<li class="one-position">
    <div class="position-section">
        <?= Html::textInput('Position['.$counter.'][position_name]', $position->name, [
            'class' => 'form-control',
        ]); ?>
        <?= Html::textInput('Position['.$counter.'][position_link]', $position->link, [
            'class' => 'form-control',
        ]); ?>
    </div>
    <a class="delete-position">X</a>
</li>
