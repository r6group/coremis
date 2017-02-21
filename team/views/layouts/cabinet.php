<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;

use yii\widgets\Breadcrumbs;
use team\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use common\models\LoginForm;
use common\models\Profile;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!--<link rel="shortcut icon" href="<?= Url::to('@web/themes/quirk/images/favicon.png') ?>" type="image/png">-->
    <?= Yii::$app->view->registerJsFile(Url::to('@web/themes/quirk/lib/modernizr/modernizr.js'), ['position' => yii\web\View::POS_HEAD]); ?>



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?=Url::to('@web/themes/quirk/lib/html5shiv/html5shiv.js')?>"></script>
    <script src="<?=Url::to('@web/themes/quirk/lib/respond/respond.src.js')?>"></script>

    <style>

    <![endif]-->
</head>
<body>
<div>
    <?php $this->beginBody() ?>

    <header>
        <div class="headerpanel">

            <div class="logopanel">
                <h2><a href="<?= Yii::$app->homeUrl; ?>">mipble</a></h2>
            </div>
            <!-- logopanel -->

            <div class="headerbar">

                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>

                <div class="searchpanel">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
          </span>
                    </div>
                    <!-- input-group -->
                </div>

                <div class="header-right">
                    <ul class="headermenu">
                        <?php
                        if (Yii::$app->user->isGuest) {
                            ?>
                            <li>
                                <div id="noticePanel" class="btn-group">
                                    <button class="btn">
                                        <a href="<?= Url::toRoute('site/signup'); ?>" class="btn"><i
                                                class="fa fa-globe"></i> Signup</a>
                                    </button>

                                </div>
                            </li>
                            <li>
                                <div id="noticePanel" class="btn-group">
                                    <button class="btn">
                                        <a href="<?= Url::toRoute('site/login'); ?>" class="btn"><i
                                                class="fa fa-key"></i> Login</a>
                                    </button>

                                </div>
                            </li>


                            <?php
                        } else {
                            ?>
                            <li>
                                <div id="noticePanel" class="btn-group">
                                    <button class="btn btn-notice alert-notice" data-toggle="dropdown">
                                        <i class="fa fa-globe"></i>
                                    </button>
                                    <div id="noticeDropdown" class="dropdown-menu dm-notice pull-right">
                                        <div role="tabpanel">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                                <li class="active"><a data-target="#notification" data-toggle="tab">Notifications
                                                        (2)</a></li>
                                                <li><a data-target="#reminders" data-toggle="tab">Reminders (4)</a></li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="notification">
                                                    <ul class="list-group notice-list">
                                                        <li class="list-group-item unread">
                                                            <div class="row">
                                                                <div class="col-xs-2">
                                                                    <i class="fa fa-envelope"></i>
                                                                </div>
                                                                <div class="col-xs-10">
                                                                    <h5><a href="">New message from Weno Carasbong</a></h5>
                                                                    <small>June 20, 2015</small>
                                                                    <span>Soluta nobis est eligendi optio cumque...</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item unread">
                                                            <div class="row">
                                                                <div class="col-xs-2">
                                                                    <i class="fa fa-user"></i>
                                                                </div>
                                                                <div class="col-xs-10">
                                                                    <h5><a href="">Renov Leonga is now following you!</a>
                                                                    </h5>
                                                                    <small>June 18, 2015</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-2">
                                                                    <i class="fa fa-user"></i>
                                                                </div>
                                                                <div class="col-xs-10">
                                                                    <h5><a href="">Zaham Sindil is now following you!</a>
                                                                    </h5>
                                                                    <small>June 17, 2015</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-2">
                                                                    <i class="fa fa-thumbs-up"></i>
                                                                </div>
                                                                <div class="col-xs-10">
                                                                    <h5><a href="">Rey Reslaba likes your post!</a></h5>
                                                                    <small>June 16, 2015</small>
                                                                    <span>HTML5 For Beginners Chapter 1</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-2">
                                                                    <i class="fa fa-comment"></i>
                                                                </div>
                                                                <div class="col-xs-10">
                                                                    <h5><a href="">Socrates commented on your post!</a></h5>
                                                                    <small>June 16, 2015</small>
                                                                    <span>Temporibus autem et aut officiis debitis...</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <a class="btn-more" href="">View More Notifications <i
                                                            class="fa fa-long-arrow-right"></i></a>
                                                </div>
                                                <!-- tab-pane -->

                                                <div role="tabpanel" class="tab-pane" id="reminders">
                                                    <h1 id="todayDay" class="today-day">...</h1>

                                                    <h3 id="todayDate" class="today-date">...</h3>

                                                    <h5 class="today-weather"><i class="wi wi-hail"></i> Cloudy 77 Degree
                                                    </h5>

                                                    <p>Thunderstorm in the area this afternoon through this evening</p>

                                                    <h4 class="panel-title">Upcoming Events</h4>
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-2">
                                                                    <h4>20</h4>

                                                                    <p>Aug</p>
                                                                </div>
                                                                <div class="col-xs-10">
                                                                    <h5><a href="">HTML5/CSS3 Live! United States</a></h5>
                                                                    <small>San Francisco, CA</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-2">
                                                                    <h4>05</h4>

                                                                    <p>Sep</p>
                                                                </div>
                                                                <div class="col-xs-10">
                                                                    <h5><a href="">Web Technology Summit</a></h5>
                                                                    <small>Sydney, Australia</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-2">
                                                                    <h4>25</h4>

                                                                    <p>Sep</p>
                                                                </div>
                                                                <div class="col-xs-10">
                                                                    <h5><a href="">HTML5 Developer Conference 2015</a></h5>
                                                                    <small>Los Angeles CA United States</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-2">
                                                                    <h4>10</h4>

                                                                    <p>Oct</p>
                                                                </div>
                                                                <div class="col-xs-10">
                                                                    <h5><a href="">AngularJS Conference 2015</a></h5>
                                                                    <small>Silicon Valley CA, United States</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <a class="btn-more" href="">View More Events <i
                                                            class="fa fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <?php
                                $profile = Profile::findOne(['user_id' => Yii::$app->user->id]);
                                $profile->setScenario('team-update-own');
                                ?>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-logged" data-toggle="dropdown">
                                        <img src="<?php echo $profile->FullAvatarUrl ?>" alt=""/>
                                        <?= Yii::$app->user->identity->f_name . ' ' . Yii::$app->user->identity->l_name ?>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?= Url::toRoute('default/index') ?>"><i class="glyphicon glyphicon-user"></i> My Profile</a>
                                        </li>
                                        <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                                        <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                                        <li><a href="<?= Url::toRoute('//site/logout') ?>" data-method="post"><i
                                                    class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <button id="chatview" class="btn btn-chat alert-notice">
                                    <span class="badge-alert"></span>
                                    <i class="fa fa-comments-o"></i>
                                </button>
                            </li>

                        <?php } ?>
                    </ul>
                </div>
                <!-- header-right -->
            </div>
            <!-- headerbar -->
        </div>
        <!-- header-->
    </header>

    <section>

        <div class="leftpanel">
            <div class="leftpanelinner">

                <!-- ################## LEFT PANEL PROFILE ################## -->
                <?php
                if (Yii::$app->user->isGuest) {
                    $login_model = new LoginForm();

                    if (isset($this->params['loginform'])) {

                        ?>


                        <div class="media leftpanel-profile">

                            <div class="inverse">
                                <h2 style="color: #fff">Login</h2>
                            </div>


                            <div class="inverse">
                                <?php $form = ActiveForm::begin(['id' => 'login-form', 'action' => Url::toRoute('site/login')]); ?>


                                <div class="form-group mb10">
                                    <?= $form->field($login_model, 'email', ['template' => "<div class=\"input-group\"><span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-user\"></i></span>\n{input}</div>\n{hint}\n{error}"])->textInput(array('placeholder' => 'Email')); ?>
                                </div>

                                <div class="form-group nomargin">

                                    <?= $form->field($login_model, 'password', ['template' => "<div class=\"input-group\"><span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-lock\"></i></span>\n{input}</div>\n{hint}\n{error}"])->passwordInput(array('placeholder' => 'Password')); ?>
                                </div>


                                <?= $form->field($login_model, 'rememberMe')->checkbox(['class' => '']) ?>


                                <div class="form-group">
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-quirk btn-block', 'name' => 'login-button']) ?>
                                </div>
                                <div style="color:#999;margin:1em 0">
                                    If you forgot your password you
                                    can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                                </div>
                                <?php ActiveForm::end(); ?>
                            </div>

                        </div>

                        <?php
                    }
                } else {
                    ?>

                    <div class="media leftpanel-profile">
                        <div class="media-left">
                            <a href="#">
                                <img src="<?php echo $profile->FullAvatarUrl ?>" alt=""
                                     class="media-object img-circle">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?= Yii::$app->user->identity->f_name . ' ' . Yii::$app->user->identity->l_name ?>
                                <a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"><i
                                        class="fa fa-angle-down"></i></a></h4>
                            <span>Software Engineer</span>
                        </div>
                    </div><!-- leftpanel-profile -->

                    <div class="leftpanel-userinfo collapse" id="loguserinfo">
                        <h5 class="sidebar-title">Address</h5>
                        <address>
                            4975 Cambridge Road
                            Miami Gardens, FL 33056
                        </address>
                        <h5 class="sidebar-title">Contact</h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <label class="pull-left">Email</label>
                                <span class="pull-right">me@themepixels.com</span>
                            </li>
                            <li class="list-group-item">
                                <label class="pull-left">Home</label>
                                <span class="pull-right">(032) 1234 567</span>
                            </li>
                            <li class="list-group-item">
                                <label class="pull-left">Mobile</label>
                                <span class="pull-right">+63012 3456 789</span>
                            </li>
                            <li class="list-group-item">
                                <label class="pull-left">Social</label>

                                <div class="social-icons pull-right">
                                    <a href="#"><i class="fa fa-facebook-official"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div><!-- leftpanel-userinfo -->

                    <ul class="nav nav-tabs nav-justified nav-sidebar">
                        <li class="tooltips active" data-toggle="tooltip" title="Main Menu"><a data-toggle="tab" data-target="#mainmenu"><i class="tooltips fa fa-ellipsis-h"></i></a></li>
                        <li class="tooltips" data-toggle="tooltip" title="Settings"><a data-toggle="tab" data-target="#settings"><i class="fa fa-cog"></i></a></li>
                        <li class="tooltips" data-toggle="tooltip" title="Log Out"><a href="<?= Url::toRoute('site/logout') ?>" data-method="post"><i class="fa fa-sign-out"></i></a></li>

                    </ul>
                <?php } ?>

                <div class="tab-content">

                    <!-- ################# MAIN MENU ################### -->

                    <div class="tab-pane active" id="mainmenu">
                        <h5 class="sidebar-title">Main menu</h5>

                        <?php

                        $menuItems = [
                            ['label' => '<i class="fa fa-home"></i><span>Home</span>', 'url' => ['/site/index']],
                            ['label' => '<i class="fa fa-calendar"></i><span>Calendar</span>', 'url' => ['/site/calendar']],
                            ['label' => '<i class="fa fa-info-circle"></i><span>About</span>', 'url' => ['/site/about']],
                            ['label' => '<i class="fa fa-envelope"></i><span>Contact</span>', 'url' => ['/site/contact']],
                        ];

                        echo Nav::widget([
                            'options' => ['class' => 'nav nav-pills nav-stacked nav-quirk'],
                            'encodeLabels' => false,
                            'items' => $menuItems,
                        ]);

                        ?>


                    </div>
                    <!-- tab-pane -->


                    <?php
                    if (!\Yii::$app->user->isGuest) {
                        ?>
                        <!-- #################### SETTINGS ################### -->

                        <div class="tab-pane" id="settings">
                            <h5 class="sidebar-title">General Settings</h5>
                            <ul class="list-group list-group-settings">
                                <li class="list-group-item">
                                    <h5>Daily Newsletter</h5>
                                    <small>Get notified when someone else is trying to access your account.</small>
                                    <div class="toggle-wrapper">
                                        <div class="leftpanel-toggle toggle-light success"></div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <h5>Call Phones</h5>
                                    <small>Make calls to friends and family right from your account.</small>
                                    <div class="toggle-wrapper">
                                        <div class="leftpanel-toggle-off toggle-light success"></div>
                                    </div>
                                </li>
                            </ul>
                            <h5 class="sidebar-title">Security Settings</h5>
                            <ul class="list-group list-group-settings">
                                <li class="list-group-item">
                                    <h5>Login Notifications</h5>
                                    <small>Get notified when someone else is trying to access your account.</small>
                                    <div class="toggle-wrapper">
                                        <div class="leftpanel-toggle toggle-light success"></div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <h5>Phone Approvals</h5>
                                    <small>Use your phone when login as an extra layer of security.</small>
                                    <div class="toggle-wrapper">
                                        <div class="leftpanel-toggle toggle-light success"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- tab-pane -->

                    <?php } ?>
                </div>
                <!-- tab-content -->


            </div>
            <!-- leftpanelinner -->
        </div>
        <!-- leftpanel -->

        <div class="mainpanel">

            <!--<div class="pageheader">
              <h2><i class="fa fa-home"></i> Dashboard</h2>
            </div>-->

            <div class="contentpanel">


                <?=
                Breadcrumbs::widget([
                    'options' => ['class' => 'breadcrumb breadcrumb-quirk'],
                    'homeLink' => [
                        'encode' => false,
                        'label' => Yii::t('yii', '<i class="fa fa-home mr5"></i> Home'),
                        'url' => Yii::$app->homeUrl,
                        'template' => "<li>{link}</li>\n",
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],

                ])
                ?>





                    <?= Alert::widget() ?>

                    <?= $content ?>


            </div>
            <!-- contentpanel -->

        </div>
        <!-- mainpanel -->

    </section>
</div>

<?php $this->endBody() ?>


</body>
</html>
<?php $this->endPage() ?>
