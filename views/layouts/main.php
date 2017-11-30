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

    $AM =[];

     $AM = ['label' => 'Activity Management', 'items' => [   

            ['label' => 'Create Activities', 'url' => ['/activities/create'],'visible'=>(!Yii::$app->user->isGuest)],
            ['label' => 'Manage Activities', 'url' => ['/activities/index'],'visible'=>(!Yii::$app->user->isGuest)],
           
            '<li class="divider"></li>',                         
            ['label' => 'Create Event Type', 'url' => ['/eventtype/create']],
            ['label' => 'Manage Event Type', 'url' => ['/eventtype/index']],
            
            '<li class="divider"></li>',
            ['label' => 'Create Join Us', 'url' => ['/joinus/create']],
            ['label' => 'Manage Join Us', 'url' => ['/joinus/index']],
           
            '<li class="divider"></li>',
            ['label' => 'Create Food Refreshment', 'url' => ['/foodrefreshments/create']],
            ['label' => 'Manage Food Refreshments', 'url' => ['/foodrefreshments/index']],
           
            '<li class="divider"></li>',
            ['label' => 'Create Give Away', 'url' => ['/giveaway/create']],
            ['label' => 'Manage Give Aways', 'url' => ['/giveaway/index']],
           
            '<li class="divider"></li>',
            ['label' => 'Create In Store Deal', 'url' => ['/instoredeal/create']],
            ['label' => 'Manage In Store Deals', 'url' => ['/instoredeal/index']],
           
            '<li class="divider"></li>',
            ['label' => 'Create Deal', 'url' => ['/deals/create']],
            ['label' => 'Manage Deals', 'url' => ['/deals/index']],

            '<li class="divider"></li>',
            ['label' => 'Create Vendor', 'url' => ['/vendor/create']],
            ['label' => 'Manage Vendors', 'url' => ['/vendor/index']],

            '<li class="divider"></li>',
            ['label' => 'Create Store', 'url' => ['/store/create']],
            ['label' => 'Manage Stores', 'url' => ['/store/index']],

            '<li class="divider"></li>',
            ['label' => 'Create Zip code', 'url' => ['/store-zip/create']],
            ['label' => 'Manage Zip codes', 'url' => ['/store-zip/index']],

            ],'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Registration', 'url' => ['/userinfo/registration'],'visible' => (!Yii::$app->user->isGuest  && Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)],

            ['label' => 'Event Management', 'items' => [
            ['label' => 'Current Events', 'url' => ['/bikeevents/index'],'visible'=>(!Yii::$app->user->isGuest  && (Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID || Yii::$app->user->identity->userTypeId == Userinfo::MANAGER_USER_TYPE_ID))],
            ['label' => 'Event Creation', 'url' => ['/bikeevents/create'],'visible'=>(!Yii::$app->user->isGuest && Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)],
            ['label' => 'Event Creation: Now Hiring', 'url' => ['/hiring/create'],'visible'=>(!Yii::$app->user->isGuest && Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)],
            ],'visible' => Yii::$app->user->isGuest ? 0 : 1,],

            $AM,

            ['label' => 'Other Forms', 'items' => [                            
            ['label' => 'F_EX_CGR_Racers_Missing_Email', 'url' => ['/db2riders/missingemail'],'visible'=>(!Yii::$app->user->isGuest && Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)],
            ['label' => 'Import_Results_Double_Check', 'url' => ['/db2riders/importresultsdoublecheck'],'visible'=>(!Yii::$app->user->isGuest && Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)],
            ['label' => 'Coach Signup Form', 'url' => ['/db2riders/coachsignupform'],'visible'=>(!Yii::$app->user->isGuest)],
            ['label' => 'Rider Signup Form', 'url' => ['/db2riders/ridersupportsignupform'],'visible'=>(!Yii::$app->user->isGuest)],
            '<li class="divider"></li>',
            ['label' => 'Manage Join Us', 'url' => ['/joinus/index'], 'visible' => (!Yii::$app->user->isGuest  && (Yii::$app->user->identity->userTypeId == Userinfo::MANAGER_USER_TYPE_ID))],
            ['label' => 'Create Join Us', 'url' => ['/joinus/create'], 'visible' => (!Yii::$app->user->isGuest  && (Yii::$app->user->identity->userTypeId == Userinfo::MANAGER_USER_TYPE_ID))],
            '<li class="divider"></li>',
            ['label' => 'Manage Brand', 'url' => ['/deals-brand/index'], 'visible' => (!Yii::$app->user->isGuest  && (Yii::$app->user->identity->userTypeId == Userinfo::MANAGER_USER_TYPE_ID))],
            ['label' => 'Create Brand', 'url' => ['/deals-brand/create'], 'visible' => (!Yii::$app->user->isGuest  && (Yii::$app->user->identity->userTypeId == Userinfo::MANAGER_USER_TYPE_ID))],
            ],'visible' => Yii::$app->user->isGuest ? 0 : 1,],

          


        ['label' => 'User Management',
            'items' => [
                ['label' => 'Create User', 'url' => ['/userinfo/create']],
                 ['label' => 'Manage Users', 'url' => ['/userinfo/index']],
            ],'visible'=>(!Yii::$app->user->isGuest && Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)
        ],

        
        ['label' => 'SQL', 'items' => [                            
        //['label' => 'Import', 'url' => ['/datamanagement/import']],
        ['label' => 'Search & Export', 'url' => ['/datamanagement/export']],
        ],'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->userTypeId == Userinfo::ADMIN_USER_TYPE_ID)],

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
    <img src='<?= Yii::$app->request->baseUrl. '/images/Cycle-Gear-logo.jpg' ?>' class='img-responsive' width='175px' alt='Cycle Gear'/>

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
