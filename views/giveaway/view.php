<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GiveAway */

$this->title = $model->Give_Away_ID;
$this->params['breadcrumbs'][] = ['label' => 'Give Aways', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="give-away-view">

    <h1 class="margin0px"><?= 'View details: '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Give_Away_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Give_Away_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a('Manage Give Aways', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Give_Away_ID',
            'Give_Away',
            'Give_Away_Image',
        ],
    ]) ?>

</div>
