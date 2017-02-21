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
        numImages1 = $(this).find('li.item').length;
      });

      $('#ourHolder2').each(function(index, elem) {
        numImages2 = $(this).find('li.item').length;
      });

      $('#ourHolder3').each(function(index, elem) {
        numImages3 = $(this).find('li.item').length;
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
        //numImages1 = $('.lv9').length;
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
    <link rel="manifest" href="http://healthkpi.moph.go.th/manifest.json">
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
            <div class="row">
                <!-- left sidebar -->


                <?php
                $param_r = Yii::$app->getRequest()->getQueryParam('r');
                $param_id = Yii::$app->getRequest()->getQueryParam('id');
                ?>

                <div id="left-sidebar" class="col-md-4 left-sidebar<?= isset($this->params['sidemenu']) ? ' minified' : ''?>">
                    <!--                        style="position: fixed; overflow: hidden; height: 100%;z-index: 1" left-sidebar-->

<!--                    <div style="overflow: scroll; height: 90%;">-->


                        <!-- main-nav -->
                        <nav class="main-nav">



                            <?php
                            if (!function_exists('getChildKpi'))   {
                                function getChildKpi($kpi_id, $param_id, $class) {

                                    $result = '';
                                    $sql_child = "SELECT l.id,
	COUNT(l.id) subitem_count,
	l.kpi_level,
	l.kpi_no,
	l.title,
	l.goal,
	l.kpi_unit,
	l.operator,
	l.max_value,
	l.tags,
	l.4e,
	l.pa,
	l.bie,
	l.hdc,
	l.result,
	l.result_r01,
	l.result_r02,
	l.result_r03,
	l.result_r04,
	l.result_r05,
	l.result_r06,
	l.result_r07,
	l.result_r08,
	l.result_r09,
	l.result_r10,
	l.result_r11,
	l.result_r12,
	l.result_r13,
	l.parent_id
FROM kpi_list l
WHERE l.kpi_year = \"".Yii::$app->config->get('KPI.GOV_YEAR')."\"
AND l.my_kpi <> 1 AND l.parent_id = ".$kpi_id."
GROUP BY l.id
ORDER BY l.kpi_no";



                                    $connection_child = Yii::$app->db_kpi;

                                    $kpi = $connection_child->cache(function ($connection) USE ($sql_child){
                                        return $connection->createCommand($sql_child)->queryAll();
                                    },300, null);

                                    $active ="";
                                    $menu_open = "";


                                    for ($i = 0; $i < sizeof($kpi); $i++) {

                                        if ($param_id == $kpi[$i]['id']) {
                                            $active = ' class="active"';
                                            $menu_open = ' open';
                                        }
                                    }





                                    for ($i = 0; $i < sizeof($kpi); $i++) {
                                        $percent = $kpi[$i]['result'];

                                        $operator = $kpi[$i]['operator'];
                                        $color = "success";

                                        $pa_bie = "";
                                        $tags_str = '';


                                        if ($kpi[$i]['pa'] != '') {
                                            $pa_bie .= " pa";
                                            $tags_str .= ' <div class="label label-success">PA</div> ';
                                        }
                                        if ($kpi[$i]['bie'] != '') {
                                            $pa_bie .= " bie";
                                            $tags_str .= ' <div class="label label-warning">สตป.</div> ';
                                        }
                                        if ($kpi[$i]['hdc'] != '') {
                                            $pa_bie .= " hdc";
                                            $tags_str .= ' <div class="label label-danger">HDC</div> ';
                                        }

                                        $active =  '';

                                        if ($param_id == $kpi[$i]['id']) {
                                            $active = ' class="active"';
                                        }

                                        $good_direct = '';

                                        if ($operator == "=") {
                                            if ($percent == $kpi[$i]['goal']) {
                                                $color = "success";
                                            } else {
                                                $color = "danger";
                                            }
                                        } elseif ($operator == ">=") {
                                            $good_direct = '<i class="fa fa-long-arrow-up pull-right" aria-hidden="true"></i>';
                                            if ($percent >= $kpi[$i]['goal']) {
                                                $color = "success";
                                            } else {
                                                $color = "danger";
                                            }
                                        } elseif ($operator == "<=") {
                                            $good_direct = '<i class="fa fa-long-arrow-down pull-right" aria-hidden="true"></i>';
                                            if ($percent <= $kpi[$i]['goal']) {
                                                $color = "success";
                                            } else {
                                                $color = "danger";
                                            }
                                        } elseif ($operator == ">") {
                                            $good_direct = '<i class="fa fa-long-arrow-up pull-right" aria-hidden="true"></i>';
                                            if ($percent > $kpi[$i]['goal']) {
                                                $color = "success";
                                            } else {
                                                $color = "danger";
                                            }
                                        } elseif ($operator == "<") {
                                            $good_direct = '<i class="fa fa-long-arrow-down pull-right" aria-hidden="true"></i>';
                                            if ($percent < $kpi[$i]['goal']) {
                                                $color = "success";
                                            } else {
                                                $color = "danger";
                                            }
                                        }




                                            $result .= '<li'.$active.'>';
                                            $result .=  Yii::$app->user->isGuest ? '' : '<span class="update"><a href="' . Yii::$app->urlManager->createUrl(['kpi-list/update', 'id' => $kpi[$i]['id']]) . '" title="ปรับปรุง" aria-label="ปรับปรุง" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a></span>';
                                            $result .= '  <a href="'. Yii::$app->urlManager->createUrl(['kpi/index', 'id' => $kpi[$i]['id']]).'">';
                                            $result .= '      <div class="data-kpi-row">';
                                            $result .= Yii::$app->user->isGuest ? '' : '<span class="update-space pull-right">.</span>';


                                            $result .= '          <div class="data-value pull-right">';
                                            $result .=  number_format((float)$percent, 2, '.', '');
                                            $result .= '              <div class="progress progress-xs">';
                                            $result .= '                  <div class="progress-bar progress-bar-'.$color.'" role="progressbar" aria-valuenow="'.$percent .'" aria-valuemin="0" aria-valuemax="'. $kpi[$i]['max_value'] .'" style="width: '. $percent .'%">';
                                            $result .= '                       <span class="sr-only"><?= $percent ?></span>';
                                            $result .= '</div></div></div>'.$good_direct.'<div class="data-kpi-name"><span class="badge pull-left">'.$kpi[$i]['kpi_no'].'</span><span class="text">'.$tags_str.stripslashes($kpi[$i]['title']).'</span></div></div></a></li>';



                                    }


                                    return $result;


                                }
                            }



                            if (!function_exists('getScope')) {
                                function getScope()
                                {
                                    $searchModel = new s();

                                    //$searchModel->search(Yii::$app->request->queryParams);

                                    $userId = 0;
                                    if (!\Yii::$app->user->isGuest) {
                                        $userId = \Yii::$app->user->identity->id;
                                    }

                                    $province = Yii::$app->config->get('KPI.DEFAULT_PROVINCE');
                                    $district = '01';
                                    $hospcode = '02444';
                                    $profileModel = Profile::findOne(['user_id' => $userId]);
                                    if (isset($profileModel)) {
                                        $hospital = \common\models\CHospital::findOne(['hoscode' => $searchModel->hospcode = $profileModel->off_id]);

                                        if (isset($hospital)) {
                                            $province = $hospital->provcode;
                                            $district = $hospital->provcode . $hospital->distcode;
                                            $hospcode = $profileModel->off_id;
                                        }

                                    }


                                    if (!$searchModel->load(Yii::$app->request->queryParams)) {

                                        $cookies = Yii::$app->request->cookies;
                                        $searchModel->scope = $cookies->getValue('KpiScope', Yii::$app->config->get('KPI.DEFAULT_SCOPE'));
                                        $searchModel->region = $cookies->getValue('KpiRegion', Yii::$app->config->get('KPI.DEFAULT_REGION'));
                                        $searchModel->province = $cookies->getValue('KpiProvince', $province);
                                        $searchModel->district = $cookies->getValue('KpiDistrict', $district);
                                        $searchModel->cup = $cookies->getValue('KpiCup', '00001');
                                        $searchModel->subdistrict = $cookies->getValue('KpiSubdistrict', '01');
                                        $searchModel->hospcode = $cookies->getValue('KpiHospcode', $hospcode);
                                    }


                                    return $searchModel;

                                }
                            }

                            $searchModel = getScope();
                            $district = ArrayHelper::map(Profile::getDistrictArray($searchModel->province), 'ampurcodefull', 'ampurname');
                            $subdistrict = ArrayHelper::map(Profile::getSubdistrictArray($searchModel->district), 'tamboncodefull', 'tambonname');







                            $cond = 'kpi_sum';
                            $locate = '';

                            switch ($searchModel->scope) {
                                case s::SCOPE_COUNTRY:
                                    $locate = 'ขอบเขตข้อมูล: ประเทศ';
                                    break;
                                case s::SCOPE_REGION:
                                    $cond = "(SELECT * FROM kpi_sum WHERE kpi_provcode IN (SELECT provid FROM co_province WHERE zoneid = '".$searchModel->region."')) ";
                                    $locate .= 'ขอบเขตข้อมูล: เขตสุขภาพที่ '.$searchModel->region;
                                    break;
                                case s::SCOPE_PROVINCE:
                                    $cond = "(SELECT * FROM kpi_sum WHERE kpi_provcode  = '".$searchModel->province."') ";
                                    $locate .= 'ขอบเขตข้อมูล: จ.'.ArrayHelper::getValue(Profile::getProvinceArray(), $searchModel->province, 'ไม่ระบุ');
                                    break;
                                case s::SCOPE_CUP:
                                    $locate .= 'CUP: '.ArrayHelper::getValue(Profile::getHosArray($searchModel->province, $searchModel->district), $searchModel->cup, 'ไม่ระบุ');
                                    break;
                                case s::SCOPE_HEALTH_UNIT:
                                    $locate .= ArrayHelper::getValue(Profile::getHosArray($searchModel->province), $searchModel->hospcode, 'ไม่ระบุ');
                                    break;
                            }



                            ?>

                            <ul class="main-menu">


                                <ul class="nav nav-tabs" role="tablist" id="filterOptions" style="margin-bottom: 4px">
                                    <li style="margin-left: 4px;"><a href="#home" role="tab" data-toggle="tab" class="all" id="all">All</a></li>
                                    <li><a href="#profile" role="tab" data-toggle="tab" class="pa" id="pa">PA</a></li>
                                    <li><a href="#settings" role="tab" data-toggle="tab" class="bie" id="bie">สตป.</a></li>
                                    <li><a href="#dropdown1" role="tab" data-toggle="tab" class="e01" id="e01">P&P</a></li>
                                    <li><a href="#dropdown2" role="tab" data-toggle="tab" class="e02" id="e02">Service</a></li>
                                    <li><a href="#" role="tab" data-toggle="tab" class="e03" id="e03">People</a></li>
                                    <li><a href="#" role="tab" data-toggle="tab" class="e04" id="e04">Governance</a></li>
                                </ul>



                                <div class="contextual-summary-info-big" style="margin-bottom: 6px;">
                                    <div class="pull-left">
                                        <p id="caption" style="margin-left: 15px;margin-top: 4px;font-weight: 400;
                                    font-size: 36px;text-align: left;"></p>
                                        <div style="margin-left: 15px;margin-top: 0px;">
                                            <button class="btn btn-default btn-scope" type="button" data-toggle="collapse"
                                                    data-target="#collapseExample"
                                                    aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa fa-cog" style="font-size: 18px;top: 1px;"></i> <?=$locate?>
                                                <i class="fa fa-chevron fa-fw" style="font-size: 14px;top: 1px;"></i>
                                            </button>

                                        </div>
                                    </div>



                                    <p id="kpi-count" style="margin-right: 15px">
                                        0  </p>
                                </div>


                                <?php
                                $form = ActiveForm::begin([
                                    'action' => ['kpi/index'],
                                    'method' => 'get',
                                    'id' => 'search-scope',
                                ]);

                                echo $this->render('/kpi/_search', [
                                    'model' => $searchModel,
                                    'form' => $form,
                                    'district' => $district,
                                    'subdistrict' => $subdistrict
                                ]);

                                ActiveForm::end();

                                ?>






                                <?php

                                $sql = "SELECT l.id,
	COUNT(l.id) subitem_count,
	l.kpi_level,
	l.kpi_no,
	l.title,
	l.goal,
	l.kpi_unit,
	l.operator,
	l.max_value,
	l.tags,
	l.4e,
	l.pa,
	l.bie,
	l.hdc,
	l.result,
	l.result_r01,
	l.result_r02,
	l.result_r03,
	l.result_r04,
	l.result_r05,
	l.result_r06,
	l.result_r07,
	l.result_r08,
	l.result_r09,
	l.result_r10,
	l.result_r11,
	l.result_r12,
	l.result_r13,
	c.parent_id
FROM kpi_list l
LEFT JOIN kpi_list AS c
ON c.parent_id = l.id
WHERE l.kpi_year = \"".Yii::$app->config->get('KPI.GOV_YEAR')."\"
AND l.kpi_level IN ('ประเทศ', 'สป.', 'กรม')
AND l.my_kpi <> 1 AND l.parent_id = 0
GROUP BY l.id
ORDER BY l.kpi_no";



                                $connection = Yii::$app->db_kpi;
                                $kpi = $connection->cache(function ($connection) USE ($sql){
                                    return $connection->createCommand($sql)->queryAll();
                                },300, null);

                                $active ="";
                                $menu_open = "";

                                //if ($param_r == "kpi/index") {
                                    for ($i = 0; $i < sizeof($kpi); $i++) {

                                        if ($param_id == $kpi[$i]['id']) {
                                            $active = ' class="active"';
                                            $menu_open = ' open';
                                        }
                                    }
                                //}
                                ?>


                                <li<?= $active; ?>>
                                    <a href="#" class="js-sub-menu-toggle" style="font-size: 12pt"><i class="fa fa-bar-chart-o fw"></i>
                                    <span class="text"<?= isset($this->params['sidemenu']) ? ' style="opacity: 0;"' : ''?>>ตัวชี้วัดระดับกระทรวง <span
                                            class="badge element-bg-color-orange" id="lv0">0</span></span>
                                        <i class="toggle-icon fa fa-angle-left"></i>
                                    </a>
                                    <ul class="sub-menu<?= $menu_open ?>" id="ourHolder1">


                                        <?php


                                        for ($i = 0; $i < sizeof($kpi); $i++) {
                                            $percent = $kpi[$i]['result'];

//                                            if ($kpi[$i]['kpi_unit'] == 'ระดับความสำเร็จ' || $kpi[$i]['kpi_unit'] == 'ขั้นตอน') {
//                                                $percent = $kpi[$i]['avg_a_value'];
//                                            }

                                            $operator = $kpi[$i]['operator'];
                                            $color = "success";

                                            $pa_bie = "";
//                                            $tags = [];
                                            $tags_str = '';

//                                            $tags = explode(',', stripslashes($kpi[$i]['tags']));
//                                            $tags_c = sizeof($tags);
//
//                                            for ($tags_c = 0; $tags_c < sizeof($tags); $tags_c++) {
//                                                $tags_str.=' <div class="label label-success">'.$tags[$tags_c].'</div> ';
//                                            }



                                            if ($kpi[$i]['pa'] != '') {
                                                $pa_bie .= " pa";
                                                $tags_str .= ' <div class="label label-success">PA</div> ';
                                            }
                                            if ($kpi[$i]['bie'] != '') {
                                                $pa_bie .= " bie";
                                                $tags_str .= ' <div class="label label-warning">สตป.</div> ';
                                            }
                                            if ($kpi[$i]['hdc'] != '') {
                                                $pa_bie .= " hdc";
                                                $tags_str .= ' <div class="label label-danger">HDC</div> ';
                                            }


                                            $active =  ' class="item e'.$kpi[$i]['4e'].$pa_bie.'"';

                                            //if ($param_r == "kpi/index") {

                                                if ($param_id == $kpi[$i]['id']) {
                                                    $active = ' class="active item e'.$kpi[$i]['4e'].$pa_bie.'"';
                                                }
                                            //}

                                            $good_direct = '';

                                            if ($operator == "=") {
                                                if ($percent == $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            } elseif ($operator == ">=") {
                                                $good_direct = '<i class="fa fa-long-arrow-up pull-right" aria-hidden="true"></i>';
                                                if ($percent >= $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            } elseif ($operator == "<=") {
                                                $good_direct = '<i class="fa fa-long-arrow-down pull-right" aria-hidden="true"></i>';
                                                if ($percent <= $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            } elseif ($operator == ">") {
                                                $good_direct = '<i class="fa fa-long-arrow-up pull-right" aria-hidden="true"></i>';
                                                if ($percent > $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            } elseif ($operator == "<") {
                                                $good_direct = '<i class="fa fa-long-arrow-down pull-right" aria-hidden="true"></i>';
                                                if ($percent < $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            }

                                        if ($kpi[$i]['parent_id'] != null) {



                                            echo '<li'.$active.'>';

                                            echo '<span class="parent-info"><a href="' . Yii::$app->urlManager->createUrl(['kpi-list/view', 'id' => $kpi[$i]['id']]) . '" title="KPI Template" aria-label="KPI Template" data-pjax="0"><i class="fa fa-file-text-o"></i></a></span>';
                                            echo '<a href="#" class="js-sub-menu-toggle"><div class="data-kpi-name"><span class="badge pull-left">'.$kpi[$i]['kpi_no'].'</span><span class="text">'.$tags_str.stripslashes($kpi[$i]['title']).'</span>';

                                            echo '</div><i class="toggle-icon fa fa-angle-down"></i></a>';

							                echo '<ul class="sub-menu " style="display: block;">';
                                            echo getChildKpi($kpi[$i]['id'], $param_id, isset($this->params['sidemenu']) ? $this->params['sidemenu'] : null);
							                echo '</ul></li>';


                                        } else {
                                            ?>

                                            <li<?= $active ?>>
                                                <?= Yii::$app->user->isGuest ? '' : '<span class="update"><a href="' . Yii::$app->urlManager->createUrl(['kpi-list/update', 'id' => $kpi[$i]['id']]) . '" title="ปรับปรุง" aria-label="ปรับปรุง" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a></span>' ?>
                                                <a href="<?= Yii::$app->urlManager->createUrl(['kpi/index', 'id' => $kpi[$i]['id']]) ?>">
                                                    <div class="data-kpi-row">
                                                        <?= Yii::$app->user->isGuest ? '' : '<span class="update-space pull-right">.</span>'; ?>


                                                        <div class="data-value pull-right">
                                                            <?= number_format((float)$percent, 2, '.', ''); ?>
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar progress-bar-<?= $color ?>"
                                                                     role="progressbar" aria-valuenow="<?= $percent ?>"
                                                                     aria-valuemin="0"
                                                                     aria-valuemax="<?= $kpi[$i]['max_value'] ?>"
                                                                     style="width: <?= $percent ?>%">
                                                                    <span class="sr-only"><?= $percent ?></span>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <?=$good_direct?>


                                                        <div class="data-kpi-name">

                                                            <span
                                                                class="badge pull-left"><?= $kpi[$i]['kpi_no'] ?></span>
                                                            <span
                                                                class="text"><?= $tags_str ?><?= stripslashes($kpi[$i]['title']) ?></span>
                                                        </div>

                                                    </div>
                                                </a>

                                            </li>

                                            <?php
                                        }
                                        }


                                        ?>

                                    </ul>
                                </li>


                                <?php


                                $sql = "SELECT l.id,
	COUNT(l.id) subitem_count,
	l.kpi_level,
	l.kpi_no,
	l.title,
	l.goal,
	l.kpi_unit,
	l.operator,
	l.max_value,
	l.tags,
	l.4e,
	l.pa,
	l.bie,
	l.hdc,
	l.result,
	l.result_r01,
	l.result_r02,
	l.result_r03,
	l.result_r04,
	l.result_r05,
	l.result_r06,
	l.result_r07,
	l.result_r08,
	l.result_r09,
	l.result_r10,
	l.result_r11,
	l.result_r12,
	l.result_r13,
	c.parent_id
FROM kpi_list l
LEFT JOIN kpi_list AS c
ON c.parent_id = l.id
WHERE l.kpi_year = \"".Yii::$app->config->get('KPI.GOV_YEAR')."\"
AND l.kpi_level = \"เขต\"
AND l.my_kpi <> 1 AND l.parent_id = 0
GROUP BY l.id
ORDER BY l.kpi_no";

                                $connection = Yii::$app->db_kpi;
                                $kpi = $connection->cache(function ($connection) USE ($sql){
                                    return $connection->createCommand($sql)->queryAll();
                                },300, null);


                                $active = "";

                                $menu_open = "";

                                //if ($param_r == "kpi/index") {
                                    for ($i = 0; $i < sizeof($kpi); $i++) {

                                        if ($param_id == $kpi[$i]['id']) {
                                            $active = ' class="active"';
                                            $menu_open = ' open';
                                        }
                                    }
                                //}


                                ?>


                                <li<?= $active; ?>>
                                    <a href="#" class="js-sub-menu-toggle" style="font-size: 12pt"><i
                                            class="fa fa-bar-chart-o fw"></i>
                                    <span
                                        class="text" <?= isset($this->params['sidemenu']) ? ' style="opacity: 0;"' : '' ?>>ตัวชี้วัดระดับเขต <span
                                            class="badge element-bg-color-orange" id="lv1">0</span></span>
                                        <i class="toggle-icon fa fa-angle-left"></i>
                                    </a>
                                    <ul class="sub-menu<?= $menu_open ?>" id="ourHolder2">


                                        <?php


                                        for ($i = 0; $i < sizeof($kpi); $i++) {
                                            $percent = $kpi[$i]['result'];

//                                            if ($kpi[$i]['kpi_unit'] == 'ระดับความสำเร็จ' || $kpi[$i]['kpi_unit'] == 'ขั้นตอน') {
//                                                $percent = $kpi[$i]['avg_a_value'];
//                                            }

                                            $operator = $kpi[$i]['operator'];
                                            $color = "success";


                                            $pa_bie = "";
//                                            $tags = [];
                                            $tags_str = '';

//                                            $tags = explode(',', stripslashes($kpi[$i]['tags']));
//                                            $tags_c = sizeof($tags);
//
//                                            for ($tags_c = 0; $tags_c < sizeof($tags); $tags_c++) {
//                                                $tags_str.=' <div class="label label-success">'.$tags[$tags_c].'</div> ';
//                                            }


                                            if ($kpi[$i]['pa'] != '') {
                                                $pa_bie .= " pa";
                                                $tags_str .= ' <div class="label label-success">PA</div> ';
                                            }
                                            if ($kpi[$i]['bie'] != '') {
                                                $pa_bie .= " bie";
                                                $tags_str .= ' <div class="label label-warning">สตป.</div> ';
                                            }
                                            if ($kpi[$i]['hdc'] != '') {
                                                $pa_bie .= " hdc";
                                                $tags_str .= ' <div class="label label-danger">HDC</div> ';
                                            }

                                            $active = ' class="item e' . $kpi[$i]['4e'] . $pa_bie . '"';

                                            //if ($param_r == "kpi/index") {

                                            if ($param_id == $kpi[$i]['id']) {
                                                $active = ' class="active item e' . $kpi[$i]['4e'] . $pa_bie . '"';
                                            }
                                            //}


                                            $good_direct = '';

                                            if ($operator == "=") {
                                                if ($percent == $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            } elseif ($operator == ">=") {
                                                $good_direct = '<i class="fa fa-long-arrow-up pull-right" aria-hidden="true"></i>';
                                                if ($percent >= $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            } elseif ($operator == "<=") {
                                                $good_direct = '<i class="fa fa-long-arrow-down pull-right" aria-hidden="true"></i>';
                                                if ($percent <= $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            } elseif ($operator == ">") {
                                                $good_direct = '<i class="fa fa-long-arrow-up pull-right" aria-hidden="true"></i>';
                                                if ($percent > $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            } elseif ($operator == "<") {
                                                $good_direct = '<i class="fa fa-long-arrow-down pull-right" aria-hidden="true"></i>';
                                                if ($percent < $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            }

                                            if ($kpi[$i]['parent_id'] != null) {



                                                echo '<li'.$active.'><a href="#" class="js-sub-menu-toggle">';
                                                echo '<div class="data-kpi-name"><span class="badge pull-left">'.$kpi[$i]['kpi_no'].'</span><span class="text">'.$tags_str.stripslashes($kpi[$i]['title']).'</span></div>';
                                                echo '<i class="toggle-icon fa fa-angle-down"></i></a>';
                                                echo '<ul class="sub-menu " style="display: block;">';
                                                echo getChildKpi($kpi[$i]['id'], $param_id, isset($this->params['sidemenu']) ? $this->params['sidemenu'] : null);
                                                echo '</ul></li>';


                                            } else {
                                            ?>
                                            <li<?= $active ?>>
                                                <?= Yii::$app->user->isGuest ? '' : '<span class="update"><a href="' . Yii::$app->urlManager->createUrl(['kpi-list/update', 'id' => $kpi[$i]['id']]) . '" title="ปรับปรุง" aria-label="ปรับปรุง" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a></span>' ?>
                                                <a href="<?= Yii::$app->urlManager->createUrl(['kpi/index', 'id' => $kpi[$i]['id']]) ?>">
                                                    <div class="data-kpi-row">
                                                        <?= Yii::$app->user->isGuest ? '' : '<span class="update-space pull-right">.</span>'; ?>


                                                        <div class="data-value pull-right">
                                                            <?= number_format((float)$percent, 2, '.', ''); ?>
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar progress-bar-<?= $color ?>"
                                                                     role="progressbar" aria-valuenow="<?= $percent ?>"
                                                                     aria-valuemin="0"
                                                                     aria-valuemax="<?= $kpi[$i]['max_value'] ?>"
                                                                     style="width: <?= $percent ?>%">
                                                                    <span class="sr-only"><?= $percent ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?=$good_direct?>
                                                        <div class="data-kpi-name">

                                                            <span
                                                                class="badge pull-left"><?= $kpi[$i]['kpi_no'] ?></span>
                                                            <span
                                                                class="text"><?= $tags_str ?><?= stripslashes($kpi[$i]['title']) ?></span>
                                                        </div>

                                                    </div>
                                                </a>
                                            </li>

                                            <?php

                                        }
                                        }

                                        ?>

                                    </ul>
                                </li>




                                <?php


                                $sql = "SELECT l.id,
	COUNT(l.id) subitem_count,
	l.kpi_level,
	l.kpi_no,
	l.title,
	l.goal,
	l.kpi_unit,
	l.operator,
	l.max_value,
	l.tags,
	l.4e,
	l.pa,
	l.bie,
	l.hdc,
	l.result,
	l.result_r01,
	l.result_r02,
	l.result_r03,
	l.result_r04,
	l.result_r05,
	l.result_r06,
	l.result_r07,
	l.result_r08,
	l.result_r09,
	l.result_r10,
	l.result_r11,
	l.result_r12,
	l.result_r13,
	c.parent_id
FROM kpi_list l
LEFT JOIN kpi_list AS c
ON c.parent_id = l.id
WHERE l.kpi_year = \"".Yii::$app->config->get('KPI.GOV_YEAR')."\"
AND l.kpi_level = \"จังหวัด\"
AND l.my_kpi <> 1 AND l.parent_id = 0
GROUP BY l.id
ORDER BY l.kpi_no";

                                $connection = Yii::$app->db_kpi;
                                $kpi = $connection->cache(function ($connection) USE ($sql){
                                    return $connection->createCommand($sql)->queryAll();
                                },300, null);


                                $active = "";
                                $menu_open = "";

                                //if ($param_r == "kpi/index") {
                                    for ($i = 0; $i < sizeof($kpi); $i++) {

                                        if ($param_id == $kpi[$i]['id']) {
                                            $active = ' class="active"';
                                            $menu_open = ' open';
                                        }
                                    }
                                //}
                                ?>


                                <li<?= $active; ?>>
                                    <a href="#" class="js-sub-menu-toggle" style="font-size: 12pt"><i class="fa fa-bar-chart-o fw"></i>
                                    <span class="text"<?= isset($this->params['sidemenu']) ? ' style="opacity: 0;"' : ''?>>ตัวชี้วัดระดับจังหวัด <span
                                            class="badge element-bg-color-orange" id="lv2">0</span></span>
                                        <i class="toggle-icon fa fa-angle-left"></i>
                                    </a>
                                    <ul class="sub-menu<?=$menu_open?>" id="ourHolder3">


                                        <?php


                                        for ($i = 0; $i < sizeof($kpi); $i++) {
                                            $percent = $kpi[$i]['result'];

//                                            if ($kpi[$i]['kpi_unit'] == 'ระดับความสำเร็จ' || $kpi[$i]['kpi_unit'] == 'ขั้นตอน') {
//                                                $percent = $kpi[$i]['avg_a_value'];
//                                            }

                                            $operator = $kpi[$i]['operator'];
                                            $color = "success";

                                            $active = ' class="item e' . $kpi[$i]['4e'] . '"';

                                            $pa_bie = "";
//                                            $tags = [];
                                            $tags_str = '';

//                                            $tags = explode(',', stripslashes($kpi[$i]['tags']));
//                                            $tags_c = sizeof($tags);
//
//                                            for ($tags_c = 0; $tags_c < sizeof($tags); $tags_c++) {
//                                                $tags_str.=' <div class="label label-success">'.$tags[$tags_c].'</div> ';
//                                            }


                                            if ($kpi[$i]['pa'] != '') {
                                                $pa_bie .= " pa";
                                                $tags_str .= ' <div class="label label-success">PA</div> ';
                                            }
                                            if ($kpi[$i]['bie'] != '') {
                                                $pa_bie .= " bie";
                                                $tags_str .= ' <div class="label label-warning">สตป.</div> ';
                                            }
                                            if ($kpi[$i]['hdc'] != '') {
                                                $pa_bie .= " hdc";
                                                $tags_str .= ' <div class="label label-danger">HDC</div> ';
                                            }

                                            $active = ' class="item e' . $kpi[$i]['4e'] . $pa_bie . '"';

                                            //if ($param_r == "kpi/index") {

                                            if ($param_id == $kpi[$i]['id']) {
                                                $active = ' class="active item e' . $kpi[$i]['4e'] . $pa_bie . '"';
                                            }
                                            // }


                                            $good_direct = '';

                                            if ($operator == "=") {
                                                if ($percent == $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            } elseif ($operator == ">=") {
                                                $good_direct = '<i class="fa fa-long-arrow-up pull-right" aria-hidden="true"></i>';
                                                if ($percent >= $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            } elseif ($operator == "<=") {
                                                $good_direct = '<i class="fa fa-long-arrow-down pull-right" aria-hidden="true"></i>';
                                                if ($percent <= $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            } elseif ($operator == ">") {
                                                $good_direct = '<i class="fa fa-long-arrow-up pull-right" aria-hidden="true"></i>';
                                                if ($percent > $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            } elseif ($operator == "<") {
                                                $good_direct = '<i class="fa fa-long-arrow-down pull-right" aria-hidden="true"></i>';
                                                if ($percent < $kpi[$i]['goal']) {
                                                    $color = "success";
                                                } else {
                                                    $color = "danger";
                                                }
                                            }


                                            if ($kpi[$i]['parent_id'] != null) {


                                                echo '<li' . $active . '><a href="#" class="js-sub-menu-toggle">';
                                                echo '<div class="data-kpi-name"><span class="badge pull-left">' . $kpi[$i]['kpi_no'] . '</span><span class="text">' . $tags_str . stripslashes($kpi[$i]['title']) . '</span></div>';
                                                echo '<i class="toggle-icon fa fa-angle-down"></i></a>';
                                                echo '<ul class="sub-menu " style="display: block;">';
                                                echo getChildKpi($kpi[$i]['id'], $param_id, isset($this->params['sidemenu']) ? $this->params['sidemenu'] : null);
                                                echo '</ul></li>';


                                            } else {
                                                ?>
                                                <li<?= $active ?>>
                                                    <?= Yii::$app->user->isGuest ? '' : '<span class="update"><a href="' . Yii::$app->urlManager->createUrl(['kpi-list/update', 'id' => $kpi[$i]['id']]) . '" title="ปรับปรุง" aria-label="ปรับปรุง" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a></span>' ?>
                                                    <a href="<?= Yii::$app->urlManager->createUrl(['kpi/index', 'id' => $kpi[$i]['id']]) ?>">
                                                        <div class="data-kpi-row">
                                                            <?= Yii::$app->user->isGuest ? '' : '<span class="update-space pull-right">.</span>'; ?>


                                                            <div class="data-value pull-right">
                                                                <?= number_format((float)$percent, 2, '.', ''); ?>
                                                                <div class="progress progress-xs">
                                                                    <div class="progress-bar progress-bar-<?= $color ?>"
                                                                         role="progressbar"
                                                                         aria-valuenow="<?= $percent ?>"
                                                                         aria-valuemin="0"
                                                                         aria-valuemax="<?= $kpi[$i]['max_value'] ?>"
                                                                         style="width: <?= $percent ?>%">
                                                                        <span class="sr-only"><?= $percent ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?=$good_direct?>
                                                            <div class="data-kpi-name">

                                                            <span
                                                                class="badge pull-left"><?= $kpi[$i]['kpi_no'] ?></span>
                                                                <span
                                                                    class="text"><?= $tags_str ?><?= stripslashes($kpi[$i]['title']) ?></span>
                                                            </div>

                                                        </div>
                                                    </a>
                                                </li>

                                                <?php

                                            }
                                        }

                                        ?>

                                    </ul>
                                </li>


                                <li<?php if (Url::to('') == Url::to(['status'])) {
                                    echo ' class="active"';
                                } ?>><a href="<?= Url::toRoute('site/status'); ?>" style="font-size: 12pt"><i class="fa fa-area-chart"></i><span
                                            class="text"<?= isset($this->params['sidemenu']) ? ' style="opacity: 0;"' : ''?>>Status</span></a></li>

                                <li<?php if (Url::to('') == Url::to(['activities'])) {
                                    echo ' class="active"';
                                } ?>><a href="<?= Url::toRoute('site/activities'); ?>" style="font-size: 12pt"><i class="fa fa-info-circle fa-fw"></i><span
                                            class="text"<?= isset($this->params['sidemenu']) ? ' style="opacity: 0;"' : ''?>>Activities</span></a></li>

                                <li<?php if (Url::to('') == Url::to(['public-dashboard'])) {
                                    echo ' class="active"';
                                } ?>><a href="<?= Url::toRoute('kpi-group/public-dashboard'); ?>" style="font-size: 12pt"><i class="fa fa-info-circle fa-fw"></i><span
                                            class="text"<?= isset($this->params['sidemenu']) ? ' style="opacity: 0;"' : ''?>>KPI Dashboard</span></a></li>


                                <li<?php if (Url::to('') == Url::to(['contact'])) {
                                    echo ' class="active"';
                                } ?>><a href="<?= Url::toRoute('site/contact'); ?>" style="font-size: 12pt"><i
                                            class="fa fa-envelope fa-fw"></i><span class="text"<?= isset($this->params['sidemenu']) ? ' style="opacity: 0;"' : ''?>>Contact us</span></a></li>
                            </ul>
                        </nav>
                        <!-- /main-nav -->


                        <!-- sidebar content -->
                        <div class="sidebar-content">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5><i class="fa fa-lightbulb-o"></i> Tips</h5>
                                </div>
                                <div class="panel-body">
                                    <p>You can do live search to the widget at search box located at top bar. It's very
                                        useful if your dashboard is full of widget.</p>
                                </div>
                            </div>
<!--                        </div>-->
                        <!-- end sidebar content -->
                    </div>
                </div>

                <!-- end left sidebar -->
                <!-- content-wrapper -->
                <div class="col-md-4">
                </div>
                <div class="col-md-8 content-wrapper<?= isset($this->params['sidemenu']) ? ' expanded' : ''?>">
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

<script>
    window.iFrameResizer = {
        targetOrigin: 'http://203.157.133.5'
    }
</script>
<script src="http://203.157.133.5/phi/js/frame_resizer/iframeResizer.contentWindow.min.js"></script>

<?php $this->endBody() ?>


</body>
</html>
<?php $this->endPage() ?>

