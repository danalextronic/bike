<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Userinfo;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BikeeventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="bike-events-index">

    <h1 class="margin0px"><?= 'Archived '.Html::encode($this->title) ?></h1>
    <hr class="customHR"/>

    <p>
        <?php
        if(Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)
        {
            echo Html::a('Back', ['index'], ['class' => 'btn btn-default glyphicon glyphicon-chevron-left']);
        }
        ?>
    </p>

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
                'class' => \microinginer\dropDownActionColumn\DropDownActionColumn::className(),
                'items' => [
                    [
                        'label' => 'View',
                        'url'   => ['view'],
                    ],
                    [
                        'label' => 'Update',
                        'url'   => ['update'],
                    ],
                    [
                        'label'   => 'Delete',
                        'url'     => ['delete'],
                        'linkOptions' => [
                            'data-method' => 'post'
                        ],
                    ],

                ]
            ],
        ],
    ]); ?>

</div>
