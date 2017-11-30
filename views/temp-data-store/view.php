<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TempDataStore */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Temp Data Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="temp-data-store-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'CMSCustID',
            'ZipCorrect',
            'CYG_Original_Store_Code',
            'CYG_Last_Purchased_Store',
            'CYG_Email_Opt_In_Flag:email',
            'LastNonBuyerActivityDate',
            'LastActivityDate',
            'LastOverallActivityDate',
            'LastOverallActivityDateInMonths',
            'userID',
            'userEmail:email',
        ],
    ]) ?>

</div>
