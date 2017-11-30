<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PercentOffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Percent Offs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="percent-off-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Percent Off', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Percent_Off_ID',
            'Percent_Off',
            'Percent_Off_Image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
