<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TempDataStore */

$this->title = 'Update Temp Data Store: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Temp Data Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="temp-data-store-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
