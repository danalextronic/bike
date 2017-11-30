<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HiringPositions */

$this->title = 'Create Hiring Positions';
$this->params['breadcrumbs'][] = ['label' => 'Hiring Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hiring-positions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
