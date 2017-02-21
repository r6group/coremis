<?php
use kpi\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\widgets\Alert;
//use kpi\models\KpiList;
use yii\web\View;
use yii\widgets\ActiveForm;
use dosamigos\multiselect\MultiSelect;
use kpi\models\s;
use common\models\Profile;
use yii\helpers\ArrayHelper;


/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

$this->registerJs("


  $('#filterOptions li a').on('click',function() {
    var ourClass = $(this).attr('class');

    $('#caption').html($(this).html());

    $('#filterOptions li').removeClass('active');
    $(this).parent().addClass('active');

    if (typeof(Storage) !== 'undefined') {
        localStorage.setItem('active_filter', ourClass);
    } else {
        // Sorry! No Web Storage support..
    }

    var numImages1 = 0;
    var numImages2 = 0;
    var numImages3 = 0;

    if(ourClass == 'all') {
      $('#ourHolder1').children('li.item').show();
      $('#ourHolder2').children('li.item').show();
      $('#ourHolder3').children('li.item').show();

      $('#ourHolder1').each(function(index, elem) {
        numImages1 = $(this).find('li').length;
      });

      $('#ourHolder2').each(function(index, elem) {
        numImages2 = $(this).find('li').length;
      });

      $('#ourHolder3').each(function(index, elem) {
        numImages3 = $(this).find('li').length;
      });
    }
    else {
      $('#ourHolder1').children('li:not(.' + ourClass + ')').hide();
      $('#ourHolder1').children('li.' + ourClass).show();

      $('#ourHolder2').children('li:not(.' + ourClass + ')').hide();
      $('#ourHolder2').children('li.' + ourClass).show();

      $('#ourHolder3').children('li:not(.' + ourClass + ')').hide();
      $('#ourHolder3').children('li.' + ourClass).show();

      $('#ourHolder1').each(function(index, elem) {
        numImages1 = $(this).find('li.' + ourClass).length;
      });

      $('#ourHolder2').each(function(index, elem) {
        numImages2 = $(this).find('li.' + ourClass).length;
      });

      $('#ourHolder3').each(function(index, elem) {
        numImages3 = $(this).find('li.' + ourClass).length;
      });
    }



    $('#lv0').html(numImages1);
    $('#lv1').html(numImages2);
    $('#lv2').html(numImages3);
    $('#kpi-count').html(numImages1+numImages2+numImages3  + '<span style=\"margin-top: -6px\">ตัวชี้วัด</span>');

    return false;
  });

     if (typeof(Storage) !== 'undefined') {
        if (localStorage.active_filter != null) {
            $('#' + localStorage.getItem('active_filter')).trigger('click');
        } else {
            $('#all').trigger('click');
        }
    } else {
        $('#all').trigger('click');
    }



", View::POS_READY, 'my-options');


$this->registerJs("


  $('.loader').fadeOut('slow');


", View::POS_LOAD, 'my-load');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 9 ]>
<html class="ie ie9" lang="<?= Yii::$app->language ?>" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="<?= Yii::$app->language ?>" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1E6887" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="manifest" href="manifest.json">
</head>
<body>
<div class="loader"></div>

<?php $this->beginBody() ?>
<!-- WRAPPER -->
<div class="wrapper">
    <!-- TOP BAR -->
    <div class="top-bar navbar-fixed-top">
<!--        navbar-fixed-top-->
        <div class="container">
            <div class="row box-shadow" id="box">
                <!-- logo -->
                <div class="col-md-2 logo">
                    <a href="<?= Yii::$app->homeUrl; ?>"><img
                            src="<?php echo $this->theme->baseUrl ?>/img/kingadmin-logo-white.png"
                            alt="R6KPI - KPI Dashboard"/></a>

                    <h1 class="sr-only">R6KPI: KPI Dashboard</h1>
                </div>
                <!-- end logo -->
                <div class="col-md-10">
                    <div class="row row-menu">
                        <div class="col-md-3">
                            <!-- search box -->
                            <?php

                            $form = ActiveForm::begin([
                                'action' => ['kpi-list/search'],
                                'method' => 'get',
                                'id' => 'search',
                            ]);
                            ?>
                            <div id="tour-searchbox" class="input-group searchbox">
                                <input type="search" class="form-control" name="KpiListSearch[title]" placeholder="enter keyword here...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
									</span>
                            </div>

                            <?php

                            ActiveForm::end();

                            ?>


                            <!-- end search box -->
                        </div>
                        <div class="col-md-9">

                            <div class="top-bar-right">


                                <a href="#" class="hidden-md hidden-lg main-nav-toggle"><i class="fa fa-bars"></i> Menu</a>

                                <?php
                                if (Yii::$app->user->isGuest) {
                                    ?>


                                    <a href="<?= Url::toRoute('site/signup'); ?>" class="btn btn-link"><i
                                            class="fa fa-globe"></i>Signup</a>
                                    <a href="<?= Url::toRoute('site/login'); ?>" class="btn btn-link"><i
                                            class="fa fa-key"></i>Login</a>


                                    <?php
                                } else {
                                    ?>
                                    <div class="notifications">


                                    </div>
                                    <!-- logged user and the menu -->
                                    <div class="logged-user">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                                <img src="<?=Profile::getAvatarByUserId(Yii::$app->user->identity->getId())?>"
                                                     alt="User Avatar"/>
                                                <span
                                                    class="name"><?= Yii::$app->user->identity->f_name . ' ' . Yii::$app->user->identity->l_name ?></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>


                                                    <a href="<?=Url::toRoute('setting/profile')?>"><i class="fa fa-user"></i><span class="text"> Profile</span></a>

                                                </li>
                                                <li>
                                                    <a href="<?=Url::toRoute('setting/profile')?>">
                                                        <i class="fa fa-cog"></i>
                                                        <span class="text">Settings</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <?= '<a href="' . Url::toRoute('site/logout') . '" data-method="post"  class="separate-none"><i class="fa fa-power-off"></i> Logout</a>' ?>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end logged user and the menu -->
                                    <?php


                                }
                                ?>


                            </div>
                            <!-- /top-bar-right -->


                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top -->


    <!-- BOTTOM: LEFT NAV AND RIGHT MAIN CONTENT -->
    <div class="bottom">
        <div class="container">
            <div class="row" style="background-color: #eeeeee;">
                <!-- left sidebar -->



                <!-- end left sidebar -->
                <!-- content-wrapper -->
                <div class="col-md-3" style="margin-top: 20px;border-right: 1px solid #b2b2b2;">
                    <?=$this->render('//layouts/side-menu.php')?>
                </div>
                <div class="col-md-9 content-wrapper<?= isset($this->params['sidemenu']) ? ' expanded' : ''?>">
                    <?php
                    if (isset($this->params['breadcrumbs'])) {
                        ?>

                        <div class="row">

                            <?=
                            Breadcrumbs::widget([
                                'homeLink' => [
                                    'label' => Yii::t('yii', 'Dashboard'),
                                    'url' => Yii::$app->homeUrl,
                                    'template' => "<li><i class=\"fa fa-home\"></i><b>{link}</b></li>\n",
                                ],
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],

                            ])
                            ?>






                        </div>

                        <?php
                    }
                    ?>

                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>


            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- END BOTTOM: LEFT NAV AND RIGHT MAIN CONTENT -->


</div>
<!-- /wrapper -->


<!-- FOOTER -->
<footer class="footer">
    &copy; Health IT <?= date('Y') ?> The Develovers
</footer>
<!-- END FOOTER -->

<?php $this->endBody() ?>


</body>
</html>
<?php $this->endPage() ?>

