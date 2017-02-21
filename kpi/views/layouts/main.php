<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use kpi\assets\AppAsset;
use kpi\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

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
    <link href="<?= Url::to('@web') ?>/css/sidebar.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();




        ?>

        <!-- Overlay for fixed sidebar -->
        <div class="sidebar-overlay"></div>

        <!-- Material sidebar -->
        <aside id="sidebar" class="sidebar sidebar-default open" role="navigation">
            <!-- Sidebar header -->
            <div class="sidebar-header header-cover" style="background-image: url(http://2.bp.blogspot.com/-2RewSLZUzRg/U-9o6SD4M6I/AAAAAAAADIE/voax99AbRx0/s1600/14%2B-%2B1%2B%281%29.jpg);">
                <!-- Top bar -->
                <div class="top-bar"></div>
                <!-- Sidebar toggle button -->
                <button type="button" class="sidebar-toggle">
                    <i class="icon-material-sidebar-arrow"></i>
                </button>
                <!-- Sidebar brand image -->
                <div class="sidebar-image">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/53474/atom_profile_01.jpg">
                </div>
                <!-- Sidebar brand name -->
                <a data-toggle="dropdown" class="sidebar-brand" href="#settings-dropdown">
                    john.doe@gmail.com
                    <b class="caret"></b>
                </a>
            </div>

            <!-- Sidebar navigation -->
            <ul class="nav sidebar-nav">
                <li class="dropdown">
                    <ul id="settings-dropdown" class="dropdown-menu">
                        <li>
                            <a href="#" tabindex="-1">
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="#" tabindex="-1">
                                Settings
                            </a>
                        </li>
                        <li>
                            <a href="#" tabindex="-1">
                                Help
                            </a>
                        </li>
                        <li>
                            <a href="#" tabindex="-1">
                                Exit
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="sidebar-icon md-inbox"></i>
                        Inbox
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="sidebar-icon md-star"></i>
                        Starred
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="sidebar-icon md-send"></i>
                        Sent Mail
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="sidebar-icon md-drafts"></i>
                        Drafts
                    </a>
                </li>
                <li class="divider"></li>
                <li class="dropdown">
                    <a class="ripple-effect dropdown-toggle" href="#" data-toggle="dropdown">
                        All Mail
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" tabindex="-1">
                                Social
                                <span class="sidebar-badge">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" tabindex="-1">
                                Promo
                                <span class="sidebar-badge">0</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        Trash
                        <span class="sidebar-badge">3</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        Spam
                        <span class="sidebar-badge">456</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        Follow Up
                        <span class="sidebar-badge badge-circle">i</span>
                    </a>
                </li>
            </ul>
            <!-- Sidebar divider -->
            <!-- <div class="sidebar-divider"></div> -->

            <!-- Sidebar text -->
            <!--  <div class="sidebar-text">Text</div> -->
        </aside>


        <div class="wrapper">
        <div class="container">


        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>

    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>


    <?php $this->endBody() ?>

    <script src="<?= Url::to('@web') ?>/js/sidebar.js"></script>
</body>
</html>
<?php $this->endPage() ?>
