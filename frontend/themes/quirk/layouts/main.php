<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;

use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
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

    <link rel="shortcut icon" href="<?=Url::to('@web/favicon.ico')?>" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?=Url::to('@web/favicon.ico')?>" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?=Url::to('@web/apple-touch-icon.png')?>" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?=Url::to('@web/apple-touch-icon-72x72.png')?>" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?=Url::to('@web/apple-touch-icon-76x76.png')?>" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?=Url::to('@web/apple-touch-icon-114x114.png')?>" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?=Url::to('@web/apple-touch-icon-120x120.png')?>" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?=Url::to('@web/apple-touch-icon-144x144.png')?>" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?=Url::to('@web/apple-touch-icon-152x152.png')?>" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?=Url::to('@web/apple-touch-icon-180x180.png')?>" />



</head>
<body<?=isset($this->params['body']) ? $this->params['body'] : ''?> style="-webkit-filter: grayscale(90%);filter: grayscale(90%);filter: grayscale(90%);
-moz-filter: grayscale(90%);
-o-filter: grayscale(90%);
-ms-filter: grayscale(90%);">
<?php $this->beginBody() ?>

<div class="body">
    <header id="header" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 67, "stickySetTop": "-67px", "stickyChangeLogo": true}'>
        <div class="header-body">
            <div class="header-top">
                <div class="container">
                    <p>
                        <span class="ml-xs"><i class="fa fa-phone"></i> 037 425 141-4</span><span class="hidden-xs"> | <i class="fa fa-envelope-o"></i> <a href="#">support@sko.moph.go.th</a></span><span> |
                            <?php
                            if (Yii::$app->user->isGuest) {
                                echo '<i class="fa fa-key"></i> <a href="'.Url::toRoute(["/site/login"]).'">Login</a></span>';

                            } else {
                                $profile = Profile::findOne(['user_id' => Yii::$app->user->id]);

                                echo '<a href="'.Url::toRoute(["/site/logout"]).'" data-method="post" ><img src="'.$profile->FullAvatarUrl.'" alt=""/ style="max-width : 22px; border-radius: 50px;"> Logout (' . Yii::$app->user->identity->fullname . ')</a></span>';
                            }


                            ?>

                    </p>
                    <div class="header-search hidden-xs">
                        <form id="searchForm" action="<?=Url::toRoute(['/content/index'])?>" method="get" novalidate="novalidate">
                            <div class="input-group">
                                <input type="text" class="form-control" name="ContentSearch[subject]" id="contentsearch-subject" placeholder="Search..." required="" aria-required="true">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
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
                            <a href="<?=Url::home()?>">
                                <img alt="SPHO" width="170" height="54" data-sticky-width="120" data-sticky-height="40" data-sticky-top="16" src="<?php echo $this->theme->baseUrl ?>/img/logo.png">
                            </a>
                        </div>
                    </div>
                    <div class="header-column">

                        <div class="header-row">
                            <div class="header-nav">
                                <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <ul class="header-social-icons social-icons hidden-xs">
                                    <li class="social-icons-facebook"><a href="https://www.facebook.com/sakaeo.moph" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                                <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                    <nav>
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li class="active">
                                                <a href="<?=Url::home()?>">
                                                    Home
                                                </a>

                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" href="#">
                                                    ข่าวประชาสัมพันธ์
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?=Url::toRoute(['/content', 'ContentSearch[cat_id]'=>2])?>">ประชาสัมพันธ์กิจกรรมบริการ</a></li>
                                                    <li><a href="<?=Url::toRoute(['/content', 'ContentSearch[cat_id]'=>17])?>">การดำเนินงานด้านสาธารณสุข</a></li>
                                                    <li><a href="<?=Url::toRoute(['/content', 'ContentSearch[cat_id]'=>20])?>">กิจกรรมเปลี่ยนความเศร้าเป็นพลัง</a></li>
                                                    <li><a href="<?=Url::toRoute(['/content', 'ContentSearch[cat_id]'=>3])?>">รับสมัครงาน</a></li>
                                                    <li><a href="<?=Url::toRoute(['/content', 'ContentSearch[cat_id]'=>4])?>">รับสมัครนักเรียนทุน</a></li>
                                                    <li><a href="<?=Url::toRoute(['/content', 'ContentSearch[cat_id]'=>5])?>">ข่าวประกวดราคา</a></li>
                                                    <li><a href="<?=Url::toRoute(['/content', 'ContentSearch[cat_id]'=>18])?>">ราคากลาง</a></li>
                                                </ul>
                                            </li>


                                            <li class="dropdown">
                                                <a class="dropdown-toggle" href="#">
                                                    บริการสุขภาพ
                                                </a>
                                                <ul class="dropdown-menu">

                                                            <li><a href="<?=Url::toRoute(['/site/regis-service'])?>">บริการทะเบียนผลิตภัณฑ์อาหาร ยา เครื่องสำอาง</a></li>
                                                            <li><a href="<?=Url::toRoute(['/site/service'])?>">บริการการแพทย์แผนไทย</a></li>


                                                </ul>
                                            </li>  <li class="dropdown">
                                                <a class="dropdown-toggle" href="#">
                                                    ข้อมูล
                                                </a>
                                                <ul class="dropdown-menu">

                                                    <li><a href="http://203.157.145.19">คลังข้อมูลสุขภาพ จ.สระแก้ว</a></li>
                                                    <li><a href="<?=Url::toRoute(['/site/govservice'])?>">ศูนย์รวมข้อมูลเพื่อติดต่อราชการ</a></li>

                                                    <li><a href="<?=Url::toRoute(['/content/index-law', 'ContentSearch[cat_id]'=>13])?>">กฎหมายที่เกี่ยวข้องด้านสาธารณสุข</a></li>
                                                    <li><a href="contact-us.html">รายงานประจำปี</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" href="#">
                                                    เกี่ยวกับหน่วยงาน
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?=Url::toRoute(['/site/about'])?>">ประวัติความเป็นมา</a></li>
                                                    <li><a href="<?=Url::toRoute(['/site/about'])?>">วิสัยทัศน์ พันธกิจ</a></li>
                                                    <li><a href="<?=Url::toRoute(['/site/board'])?>">โครงสร้างหน่วยงาน</a></li>
                                                    <li><a href="<?=Url::toRoute(['/site/about'])?>">ภารกิจ และหน้าที่รับผิดชอบ</a></li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a href="<?=Url::toRoute(['/site/contact'])?>">
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
            <div id="multicolorBar" style="bottom: 0px;
    position: absolute;
    width: 100%;">
                <div class="col-xs-2" style="border-bottom:4px solid #098BB1;"></div>
                <div class="col-xs-2" style="border-bottom:4px solid #E7C61E;"></div>
                <div class="col-xs-2" style="border-bottom:4px solid #90597A;"></div>
                <div class="col-xs-2" style="border-bottom:4px solid #CC4B3A;"></div>
                <div class="col-xs-2" style="border-bottom:4px solid #F6A01A;"></div>
                <div class="col-xs-2" style="border-bottom:4px solid #A3A510;"></div>
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

                <?php }?>
            </div>
        </section>
<?php
}
?>

                <?= Alert::widget() ?>
                <?= $content ?>



    </div>

    <footer id="<?= isset($this->params['nofooter']) ? 'nofooter' : 'footer'?>">
        <?php
        if (!isset($this->params['nofooter'])) {
            ?>
        <div class="container">

            <div class="row">
                <div class="footer-ribbon">
                    <span>Get in Touch</span>
                </div>
                <div class="col-md-3">
                    <div class="newsletter">
                        <h4>Newsletter</h4>
                        <p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>

                        <div class="alert alert-success hidden" id="newsletterSuccess">
                            <strong>Success!</strong> You've been added to our email list.
                        </div>

                        <div class="alert alert-danger hidden" id="newsletterError"></div>

                        <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
                            <div class="input-group">
                                <input class="form-control" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit">Go!</button>
										</span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>Latest Tweets</h4>
                    <div id="tweet" class="twitter" data-plugin-tweets data-plugin-options='{"username": "", "count": 2}'>
                        <p>Links หน่วยงานที่เกี่ยวข้อง</p>
                        <!-- Histats.com  START  (standard)-->
                        <script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
                        <a href="http://www.histats.com" target="_blank" title="simple hit counter" ><script  type="text/javascript" >
                                try {Histats.start(1,3279024,4,604,110,55,"00011111");
                                    Histats.track_hits();} catch(err){};
                            </script></a>
                        <noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?3279024&101" alt="simple hit counter" border="0"></a></noscript>
                        <!-- Histats.com  END  -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-details">
                        <h4>Contact Us</h4>
                        <ul class="contact">
                            <li><p><i class="fa fa-map-marker"></i> <strong>ที่อยู่:</strong> 609 ม.2 ต.ท่าเกษม อ.เมืองสระแก้ว จ.สระแก้ว 27000</p></li>
                            <li><p><i class="fa fa-phone"></i> <strong>โทร:</strong> 037 425 141-4 โทรสาร: ต่อ 100</p></li>
                            <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">support@sko.moph.go.th</a></p></li>
                        </ul>

                    </div>
                </div>
                <div class="col-md-2">
                    <h4>Follow Us</h4>
                    <ul class="social-icons">
                        <li class="social-icons-facebook"><a href="https://www.facebook.com/sakaeo.moph" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                    <br>

                    <a href="<?=Url::toRoute(['/site/contact'])?>" class="btn btn-danger">ร้องเรียน-ร้องทุกข์</a>
                </div>
            </div>


        </div>
        <?php
        }
        ?>


        <div>
            <div class="col-xs-2" style="border-bottom:4px solid #098BB1;"></div>
            <div class="col-xs-2" style="border-bottom:4px solid #E7C61E;"></div>
            <div class="col-xs-2" style="border-bottom:4px solid #90597A;"></div>
            <div class="col-xs-2" style="border-bottom:4px solid #CC4B3A;"></div>
            <div class="col-xs-2" style="border-bottom:4px solid #F6A01A;"></div>
            <div class="col-xs-2" style="border-bottom:4px solid #A3A510;"></div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <a href="<?=Url::home()?>" class="logo">
                            <img alt="Porto Website Template" class="img-responsive" src="<?php echo $this->theme->baseUrl ?>/img/logo-footer.png" style="max-width: 90px">
                        </a>
                    </div>
                    <div class="col-md-5">
                        <p>© Copyright 2015. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <nav id="sub-menu">
                            <ul>
                                <li><a href="http://team.sko.moph.go.th">สำหรับเจ้าหน้าที่</a></li>
                                <li><a href="<?=Url::toRoute(['/site/faq'])?>">คำถามที่พบบ่อย</a></li>
                                <li><a href="<?=Url::toRoute(['/site/site-map'])?>">แผนผังเว็บไซต์</a></li>
                                <li><a href="<?=Url::toRoute(['/site/contact'])?>">ติดต่อสอบถาม</a></li>
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
