<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StoreZip */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Store Zips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-zip-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Manage Events', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'store_id',
            [
                'label'=>'Zip Codes',
                'type'=>'raw',
                'value'=> $model->getZipCodesAsString()
            ],
        ],
    ]) ?>

</div>
