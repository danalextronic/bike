<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Userinfo;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
       // 'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            //['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Registration', 'url' => ['/userinfo/registration']],
            
            
            ['label' => 'Forms (Bike_Nights_Info_PB-MC.mdb)', 'items' => [                            
            ['label' => 'Form 1', 'url' => ['/bikenighttemplate/create'],'visible'=>(!Yii::$app->user->isGuest)],
            //['label' => 'Manage Users', 'url' => ['/userinfo/index'],'visible'=>(!Yii::$app->user->isGuest && Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)],
            //['label' => 'Change Your Password', 'url' => ['userinfo/changepassword']],                          
                        ],'visible' => Yii::$app->user->isGuest ? 0 : 1,],
           

            ['label' => 'Forms (2015 CGR_Rider_Results-MC-withPII.mdb)', 'items' => [                            
            ['label' => 'F_EX_CGR_Racers_Missing_Email', 'url' => ['/db2riders/missingemail'],'visible'=>(!Yii::$app->user->isGuest && Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)],
            ['label' => 'Import_Results_Double_Check', 'url' => ['/db2riders/importresultsdoublecheck'],'visible'=>(!Yii::$app->user->isGuest && Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)],
            ['label' => 'Rider Support Signup', 'url' => ['/db2riders/ridersupportsignupform'],'visible'=>(!Yii::$app->user->isGuest)],

            //['label' => 'Manage Users', 'url' => ['/userinfo/index'],'visible'=>(!Yii::$app->user->isGuest && Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)],
            //['label' => 'Change Your Password', 'url' => ['userinfo/changepassword']],                          
                        ],'visible' => Yii::$app->user->isGuest ? 0 : 1,],

            //['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>
    
    <div class="container">
    <img src='<?= Yii::$app->request->baseUrl. '/images/Cycle-Gear-logo.jpg' ?>' class='img-responsive' width='200px' alt='Cycle Gear'/>

        <?php
		/*
		echo Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]);
		*/
		?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= date('Y') ?></p>

        <p class="pull-right"></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
