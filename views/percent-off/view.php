<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PercentOff */

$this->title = $model->Percent_Off_ID;
$this->params['breadcrumbs'][] = ['label' => 'Percent Offs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="percent-off-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Percent_Off_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Percent_Off_ID], [
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
            'Percent_Off_ID',
            'Percent_Off',
            'Percent_Off_Image',
        ],
    ]) ?>

</div>
