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
use common\models\Profile;


AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="th-TH">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!--<link rel="shortcut icon" href="<?= Url::to('@web/themes/quirk/images/favicon.png') ?>" type="image/png">-->

    <link rel="shortcut icon" href="<?= Url::to('@web/favicon.ico') ?>" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="<?= Url::to('@web/favicon.ico') ?>"/>
    <link rel="apple-touch-icon" sizes="57x57" href="<?= Url::to('@web/apple-touch-icon.png') ?>"/>
    <link rel="apple-touch-icon" sizes="72x72" href="<?= Url::to('@web/apple-touch-icon-72x72.png') ?>"/>
    <link rel="apple-touch-icon" sizes="76x76" href="<?= Url::to('@web/apple-touch-icon-76x76.png') ?>"/>
    <link rel="apple-touch-icon" sizes="114x114" href="<?= Url::to('@web/apple-touch-icon-114x114.png') ?>"/>
    <link rel="apple-touch-icon" sizes="120x120" href="<?= Url::to('@web/apple-touch-icon-120x120.png') ?>"/>
    <link rel="apple-touch-icon" sizes="144x144" href="<?= Url::to('@web/apple-touch-icon-144x144.png') ?>"/>
    <link rel="apple-touch-icon" sizes="152x152" href="<?= Url::to('@web/apple-touch-icon-152x152.png') ?>"/>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Url::to('@web/apple-touch-icon-180x180.png') ?>"/>


</head>
<body<?= isset($this->params['body']) ? $this->params['body'] : '' ?>>
<?php $this->beginBody() ?>

<div class="body">
    <header id="header"
            data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 67, "stickySetTop": "-67px", "stickyChangeLogo": true}'>
        <div class="header-body">
            <div class="header-top">
                <div class="container">
                    <p>
                        <span class="ml-xs"><i class="fa fa-phone"></i> 037 425 141-4</span><span
                            class="hidden-xs"> | <i class="fa fa-envelope-o"></i> <a href="#">support@sko.moph.go.th</a></span><span> |
                            <?php
                            if (Yii::$app->user->isGuest) {
                                echo '<i class="fa fa-key"></i> <a href="' . Url::toRoute(["/site/login"]) . '">Login</a></span>';

                            } else {
                                $profile = Profile::findOne(['user_id' => Yii::$app->user->id]);

                                echo '<a href="' . Url::toRoute(["/site/logout"]) . '" data-method="post" ><img src="' . $profile->FullAvatarUrl . '" alt=""/ style="max-width : 22px; border-radius: 50px;"> Logout (' . Yii::$app->user->identity->fullname . ')</a></span>';
                            }


                            ?>

                    </p>

                    <div class="header-search hidden-xs">
                        <form id="searchForm" action="<?= Url::toRoute(['/content/index']) ?>" method="get"
                              novalidate="novalidate">
                            <div class="input-group">
                                <input type="text" class="form-control" name="ContentSearch[subject]"
                                       id="contentsearch-subject" placeholder="Search..." required=""
                                       aria-required="true">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
                                            </button>
										</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="header-container container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-logo">
                            <a href="<?= Url::home() ?>">
                                <img alt="SPHO" width="170" height="54" data-sticky-width="120" data-sticky-height="40"
                                     data-sticky-top="16" src="<?php echo $this->theme->baseUrl ?>/img/logo.png">
                            </a>
                        </div>
                    </div>
                    <div class="header-column">

                        <div class="header-row">
                            <div class="header-nav">
                                <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                        data-target=".header-nav-main">
                                    <i class="fa fa-bars"></i>
                                </button>

                                <div
                                    class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                    <nav>
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li class="active">
                                                <a href="<?= Url::home() ?>">
                                                    Home
                                                </a>

                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" href="#">
                                                    ข่าวประชาสัมพันธ์
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?= Url::toRoute(['/content', 'ContentSearch[cat_id]' => 2]) ?>">ข่าวประชาสัมพันธ์</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" href="#">
                                                    ปฏิทิน
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?= Url::toRoute(['/site/calendar-ceo']) ?>">วาระงานผู้บริหาร สสจ.สระแก้ว</a>
                                                    </li>

                                                </ul>
                                            </li>

                                            <li class="dropdown">
                                                <a class="dropdown-toggle" href="#">
                                                    Download
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?= Url::toRoute(['/content', 'ContentSearch[cat_id]' => 19]) ?>">กบห</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= Url::toRoute(['/content', 'ContentSearch[cat_id]' => 20]) ?>">คปสจ</a>
                                                    </li>

                                                </ul>
                                            </li>


                                            <li class="dropdown">
                                                <a class="dropdown-toggle" href="#">
                                                    ศูนย์สนับสนุนวิชากร
                                                </a>
                                                <ul class="dropdown-menu">

                                                    <li><a href="<?= Url::toRoute(['/site/regis-service']) ?>">กฎหมาย/ระเบียบที่เกี่ยวข้องด้านสาธารณสุข</a>
                                                    </li>
                                                    <li><a href="<?= Url::toRoute(['/site/service']) ?>">การดำเนินงานด้านข้อมูล
                                                            และเทคโนโลยีสารสนเทศ</a></li>
                                                    <li><a href="<?= Url::toRoute(['/site/service-dent']) ?>">แผนยุทธศาสตร์สุขภาพจังหวัดสระแก้ว</a>
                                                    </li>
                                                    <li><a href="<?= Url::toRoute(['/content', 'ContentSearch[cat_id]' => 21]) ?>">เอกสารวิชาการ/งานวิจัย</a>
                                                    </li>


                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" href="#">
                                                    ข้อมูล
                                                </a>
                                                <ul class="dropdown-menu">

                                                    <li><a href="http://203.157.145.19">Health Explorer</a></li>
                                                    <li><a href="http://203.157.145.17/hdc">HDC (สระแก้ว)</a></li>

                                                    <li><a href="http://hdcservice.moph.go.th">HDC Service (ประเทศ)</a>
                                                    </li>
                                                    <li><a href="http://zone6.cbo.moph.go.th">ศูนย์ข้อมูลเขตสุขภาพที่
                                                            6</a></li>
                                                    <li><a href="http://team.sko.moph.go.th/healthscript/">Health
                                                            Script</a></li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a href="<?= Url::toRoute(['/site/contact']) ?>">
                                                    ติดต่อ
                                                </a>

                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <div role="main" class="main">


        <?php
        if (isset($this->params['breadcrumbs'])) {
            ?>

            <section class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
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

                            ]);
                            ?>
                        </div>
                    </div>
                    <?php
                    if (!isset($this->params['hide_title'])) {

                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h1><?= Html::encode($this->title) ?></h1>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </section>
            <?php
        }
        ?>

        <?= Alert::widget() ?>
        <?= $content ?>


    </div>

    <div class="container">
        <!-- Histats.com  START  (standard)-->
        <script
            type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
        <a href="http://www.histats.com" target="_blank" title="">
            <script type="text/javascript">
                try {
                    Histats.start(1, 3349481, 4, 2050, 280, 25, "00011111");
                    Histats.track_hits();
                } catch (err) {
                }
                ;
            </script>
        </a>
        <noscript><a href="http://www.histats.com" target="_blank"><img
                    src="http://sstatic1.histats.com/0.gif?3349481&101" alt="" border="0"></a></noscript>
        <!-- Histats.com  END  -->
    </div>


    <footer id="nofooter">


        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <a href="<?= Url::home() ?>" class="logo">
                            <img alt="Porto Website Template" class="img-responsive"
                                 src="<?php echo $this->theme->baseUrl ?>/img/logo-footer.png" style="max-width: 90px">
                        </a>
                    </div>
                    <div class="col-md-5">
                        <p>© Copyright 2015. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <nav id="sub-menu">
                            <ul>
                                <li><a href="http://team.sko.moph.go.th">สำหรับเจ้าหน้าที่</a></li>
                                <li><a href="<?= Url::toRoute(['/site/faq']) ?>">คำถามที่พบบ่อย</a></li>
                                <li><a href="<?= Url::toRoute(['/site/site-map']) ?>">แผนผังเว็บไซต์</a></li>
                                <li><a href="<?= Url::toRoute(['/site/contact']) ?>">ติดต่อสอบถาม</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php $this->endBody() ?>


</body>
</html>
<?php $this->endPage() ?>
