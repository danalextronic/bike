<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DealBrand */

$this->title = 'Update Brand: ' . ' ' . $model->Deal_Brand_ID;
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Deal_Brand_ID, 'url' => ['view', 'id' => $model->Deal_Brand_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deal-brand-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
