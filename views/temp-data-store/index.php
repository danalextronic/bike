<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TempDataStoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Temp Data Stores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="temp-data-store-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Temp Data Store', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'CMSCustID',
            'ZipCorrect',
            'CYG_Original_Store_Code',
            'CYG_Last_Purchased_Store',
            // 'CYG_Email_Opt_In_Flag:email',
            // 'LastNonBuyerActivityDate',
            // 'LastActivityDate',
            // 'LastOverallActivityDate',
            // 'LastOverallActivityDateInMonths',
            // 'userID',
            // 'userEmail:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
