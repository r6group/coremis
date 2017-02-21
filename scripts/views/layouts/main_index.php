<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use scripts\assets\FrontpageAppAsset;
use scripts\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

FrontpageAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="" name="description">
    <meta content="" name="author">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
</head>
<body class="page-header-fixed">
    <?php $this->beginBody() ?>

    <!-- BEGIN MAIN LAYOUT -->
    <!-- Header BEGIN -->
    <header class="page-header" style="border-bottom: 0px">
        <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="toggle-icon">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </span>
                    </button>
                    <a class="navbar-brand" href="#intro">
                        <img class="logo-default" src="<?= Url::to('@web') ?>/images/hs_logo_white.png" alt="Logo">
                        <img class="logo-scroll" src="<?= Url::to('@web') ?>/images/hs_logo.png" alt="Logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <?php

                    $menuItems = [
                        ['label' => 'Home', 'url' => ['/site/index']],

                        ['label' => 'Public Scripts', 'url' => ['/scripts/index']],
                        ['label' => 'My Scripts', 'url' => ['/scripts/myscripts']],
                    ];

                    if (Yii::$app->user->isGuest) {
                        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                    } else {
                        $menuItems[] = [
                            'label' => 'Logout (' . Yii::$app->user->identity->f_name . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ];
                    }
                    echo Nav::widget([
                        'options' => ['class' => 'nav navbar-nav'],
                        'items' => $menuItems,
                    ]);

                    ?>

                <!-- End Navbar Collapse -->
            </div>
            <!--/container-->
        </nav>
    </header>
    <!-- Header END -->



        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>


    <!--[if lt IE 9]>
    <script src="<?= Url::to('@web') ?>/theme/global/plugins/respond.min.js"></script>
    <script src="<?= Url::to('@web') ?>/theme/global/plugins/excanvas.min.js"></script>
    <![endif]-->

    <?php $this->endBody() ?>


    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function() {
            Layout.init();
            RevosliderInit.initRevoSlider();

        });
        </script>
</body>
</html>
<?php $this->endPage() ?>
