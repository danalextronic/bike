<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Deals */

$this->title = 'Create Deals';
$this->params['breadcrumbs'][] = ['label' => 'Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deals-create">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	<p>
        <?= Html::a('Manage Deals', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
