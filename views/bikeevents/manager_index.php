<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>

<div class="bike-events-index">

    <h1 class="margin0px"><?= 'Manage '.Html::encode($this->title) ?></h1>
	<hr class="customHR"/>

<?php

echo GridView::widget(['dataProvider' => $dataProvider,

	'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'event_template_titles',
            'start_date',
            'event_time',
            'start_date',

             ['class' => 'yii\grid\ActionColumn',
             'template' =>'{view} {update}',

             ],

            ],
           


	]);

?>

</div>