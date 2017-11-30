<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PercentOff */

$this->title = 'Create Percent Off';
$this->params['breadcrumbs'][] = ['label' => 'Percent Offs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="percent-off-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
