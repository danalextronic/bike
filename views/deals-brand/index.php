<?php

use app\models\Userinfo;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DealsBrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Brands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deal-brand-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Brand', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $item = [];
    if (Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID) {
        $item = [
            ['label' => 'Update', 'url' => ['update']],
            ['label' => 'Delete', 'url' => ['delete'], 'linkOptions' => ['data-method' => 'post']],
            ['label' => 'View', 'url' => ['view']]
        ];
    } else {
        $item = [
            ['label' => 'Update', 'url' => ['update']],
            ['label' => 'View', 'url' => ['view']]
        ];
    }
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Deal_Brand_ID',
            'Deal_Brand',
            'Deal_Brand_Image',

            [
                'class' => \microinginer\dropDownActionColumn\DropDownActionColumn::className(),
                'items' => $item
            ],
        ],
    ]); ?>

</div>
