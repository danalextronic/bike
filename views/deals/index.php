<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DealsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Deals';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
");

?>

<div class="deals-index">

    <h1 class="margin0px"><?= 'Manage '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>

    <p>
        <?= Html::a('Create Deals', ['create'], ['class' => 'btn btn-success']) ?>
		<?= Html::a('Advanced Search', ['#'], ['class' => 'btn btn-default search-button']) ?>
    </p>
	
	<div class="search-form" style="display:none">
		    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
		</div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Deals_ID',
            'Deal_Name',
              // 'Join_US_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
