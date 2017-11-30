<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PercentOff */

$this->title = 'Update Percent Off: ' . ' ' . $model->Percent_Off_ID;
$this->params['breadcrumbs'][] = ['label' => 'Percent Offs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Percent_Off_ID, 'url' => ['view', 'id' => $model->Percent_Off_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="percent-off-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
