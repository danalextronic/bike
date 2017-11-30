<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
");

?>

<div class="userinfo-index">

    <h1 class="margin0px"><?= 'Manage '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
		<?= Html::a('Advanced Search', ['#'], ['class' => 'btn btn-default search-button']) ?>
    </p>
	
	<div class="search-form" style="display:none">
		    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
		</div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'userId',
            'username',
            //'password',
            'fullName',
            'email:email',
            ['attribute'=>'userTypeId','value'=>'userType.typeName'],
            ['attribute'=>'storeId','value'=>'store.Store_Name'],
            // 'auth_key',
            // 'password_reset_token',
            // 'lastVisitedOn',
            // 'lastVisitedIP',
            // 'createdBy',
            // 'createdOn',
            // 'createdIP',
            // 'lastEditedBy',
            // 'lastEditedOn',
            // 'lastEditedIP',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
