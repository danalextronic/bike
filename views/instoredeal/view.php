<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InStoreDeal */

$this->title = $model->In_Store_Deal_ID;
$this->params['breadcrumbs'][] = ['label' => 'In Store Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="in-store-deal-view">

    <h1 class="margin0px"><?= 'View details: '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->In_Store_Deal_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->In_Store_Deal_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a('Manage In Store Deals', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'In_Store_Deal_ID',
            'In_Store_Deal',
            'In_Store_Deal_Image',
        ],
    ]) ?>

</div>
