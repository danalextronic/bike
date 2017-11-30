<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StoreZip */

$this->title = 'Update Store Zip: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Store Zips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="store-zip-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
