<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TempDataStore */

$this->title = 'Create Temp Data Store';
$this->params['breadcrumbs'][] = ['label' => 'Temp Data Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="temp-data-store-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
