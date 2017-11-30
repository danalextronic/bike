<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Userinfo;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BikeeventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
");

?>

<div class="bike-events-index">

    <h1 class="margin0px"><?= 'Manage '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>

    <p>       
		<?php
            if(Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)
            {
                echo Html::a('Create Events', ['create'], ['class' => 'btn btn-success']);
                echo "&nbsp;";
                echo Html::a('Advanced Search', ['#'], ['class' => 'btn btn-default search-button']);
                echo "&nbsp;";
                echo Html::a('Archived Events', ['archive-list'], ['class' => 'btn btn-default']);
            }
        ?>
    </p>
	
	<div class="search-form" style="display:none">
		    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
	</div>

    <?php
    $item = [];
    if(Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID) {
        $item = [
            ['label' => 'Update', 'url'   => ['update']],
            ['label' => 'Delete', 'url' => ['delete'], 'linkOptions' => ['data-method' => 'post']],
            ['label'   => 'Archive', 'url'     => ['archive'], 'linkOptions' => ['data-method' => 'post']]
        ];
    }
    else {
        $item = [
            ['label' => 'Update', 'url'   => ['update']],
        ];
    }
    ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
     //   'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'event_template_titles',
            'start_date',
            'end_date',
            'eventTime',
            [
                'label' => 'Status',
                'format' => 'raw',
                'value' => function ($data) {
                    return ($data->is_changed == 1) ? '<span class="review label label-warning">waiting for review</span>' : '';
                }

            ],
            // 'eventTypeId',
            // 'join_us_id',
            // 'food_refreshments_id',
            // 'give_away_id',
            // 'in_store_deal_id',
            // 'deals_id',
            // 'vendor_1',
            // 'vendor_1_details:ntext',
            // 'vendor_1_image',
            // 'vendor_2',
            // 'vendor_2_details:ntext',
            // 'vendor_2_image',
            // 'vendor_3',
            // 'vendor_3_details:ntext',
            // 'vendor_3_image',
            // 'vendor_4',
            // 'vendor_4_details:ntext',
            // 'vendor_4_image',
            // 'vendor_5',
            // 'vendor_5_details:ntext',
            // 'vendor_5_image',
            // 'vendor_6',
            // 'vendor_6_details:ntext',
            // 'vendor_6_image',
            // 'vendor_7',
            // 'vendor_7_details:ntext',
            // 'vendor_7_image',
            // 'vendor_8',
            // 'vendor_8_details:ntext',
            // 'vendor_8_image',
            // 'vendor_9',
            // 'vendor_9_details:ntext',
            // 'vendor_9_image',
            // 'vendor_10',
            // 'vendor_10_details:ntext',
            // 'vendor_10_image',

            [
                'class' => \microinginer\dropDownActionColumn\DropDownActionColumn::className(),
                'items' => $item
            ],
        ],
    ]); ?>

</div>
