<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InStoreDeal */

$this->title = 'Create In Store Deal';
$this->params['breadcrumbs'][] = ['label' => 'In Store Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="in-store-deal-create">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	<p>
        <?= Html::a('Manage In Store Deals', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
