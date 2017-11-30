<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Db2Riders */

$this->title = 'Create Db2 Riders';
$this->params['breadcrumbs'][] = ['label' => 'Db2 Riders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db2-riders-create">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	<p>
        <?= Html::a('Manage Db2 Riders', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
