<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hiring */

$this->title = 'Create Hiring';
$this->params['breadcrumbs'][] = ['label' => 'Hirings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hiring-create">

    <h1 class="margin0px"><?= Html::encode($this->title) ?></h1>
	<hr class="customHR"/>
	<p>
        <?= Html::a('Manage Hirings', ['index'], ['class' => 'btn btn-success']) ?>	
    </p>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
