<?php

use app\models\Userinfo;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JoinUsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Join Us';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
");

?>

<div class="join-us-index">

    <h1 class="margin0px"><?= 'Manage '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>

    <p>
        <?= Html::a('Create Join Us', ['create'], ['class' => 'btn btn-success']) ?>
		<?= Html::a('Advanced Search', ['#'], ['class' => 'btn btn-default search-button']) ?>
    </p>
	
	<div class="search-form" style="display:none">
		    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
		</div>

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
            'Join_US',
            'Join_US_Image',

            [
                'class' => \microinginer\dropDownActionColumn\DropDownActionColumn::className(),
                'items' => $item
            ],
        ],
    ]); ?>

</div>
