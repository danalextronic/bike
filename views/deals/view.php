<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Deals */

$this->title = $model->Deal_Name;
$this->params['breadcrumbs'][] = ['label' => 'Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deals-view">

    <h1 class="margin0px"><?= 'View details: '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Deals_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Deals_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a('Manage Deals', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Deals_ID',
            'Deal_Name',
            [
                'label'=>'Deal Images',
                'format'=>'raw',
                'value' => $model->getDealImagesAsArray()
            ],
            [
                'label'=>'Join Us',
                'format' => 'raw',
                'value' => "Title:<br/>".
                            "<strong>".$model->joinUs->Join_US."</strong><br/>".
                            "Join Us image: <br/>" .
                            $model->getDealJoinUsImage() ."<br/>".
                            "( ". $model->getJoinUsImageLink()." )",
            ],
            [
                'label'=>'Deal Brands',
                'value'=> $model->getDealBrandsAsString(),
            ],
        ],
    ]);

    ?>

</div>
