<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HiringPositions */

$this->title = 'Update Hiring Positions: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Hiring Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hiring-positions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'positions' => $positions,
    ]) ?>

</div>
