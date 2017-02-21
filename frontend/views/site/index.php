<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = 'สำนักงานสาธารณสุขจังหวัดสระแก้ว';
$this->params['loginform'][] = true;


//$this->registerCssFile(Url::to('@web/themes/quirk/lib/morrisjs/morris.css'));
////$this->registerCssFile(Url::to('@web/themes/quirk/lib/weather-icons/css/weather-icons.css'));
//
//Yii::$app->view->registerJsFile(Url::to('@web/themes/quirk/lib/morrisjs/morris.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);
//Yii::$app->view->registerJsFile(Url::to('@web/themes/quirk/js/dashboard.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);
//Yii::$app->view->registerJsFile(Url::to('@web/weather.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div class="slider-container rev_slider_wrapper">
    <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider
         data-plugin-options='{"gridwidth": 1170, "gridheight": 417}'>
        <ul>
            <li data-transition="fade">
                <img src="<?php echo $this->theme->baseUrl ?>/img/custom-header-bg-dark.jpg"
                     alt=""
                     data-bgposition="center center"
                     data-bgfit="cover"
                     data-bgrepeat="no-repeat"
                     class="rev-slidebg">

                <div class="tp-caption mid-label"
                     data-x="230"
                     data-y="100"
                     data-start="500"
                     data-transform_in="y:[-300%];opacity:0;s:1500;">ปวงข้าพระพุทธเจ้า
                </div>


                <div class="tp-caption mid-label"
                     data-x="180"
                     data-y="150"
                     data-start="1500"
                     data-transform_in="y:[100%];s:1500;">ขอน้อมเกล้าน้อมกระหม่อม
                </div>


                <div class="tp-caption mid-label"
                     data-x="94"
                     data-y="200"
                     data-start="2000"
                     data-transform_in="y:[100%];s:1500;">รำลึกในพระมหากรุณาธิคุณหาที่สุดมิได้
                </div>

                <div class="tp-caption top-label"
                     data-x="284"
                     data-y="250"
                     data-start="2500"
                     data-transform_in="y:[100%];s:1500;">ข้าพระพุทธเจ้า
                </div>

                <div class="tp-caption top-label"
                     data-x="90"
                     data-y="290"
                     data-start="3000"
                     data-transform_in="y:[100%];s:1500;">ผู้บริหาร และเจ้าหน้าที่ สำนักงานสาธารณสุขจังหวัดสระแก้ว
                </div>



                <div class="tp-caption"
                     data-x="right" data-hoffset="-50"
                     data-y="middle" data-voffset="0"
                     data-start="500"
                     data-transform_in="z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:100% 100%;s:2000;">
                    <img src="<?php echo $this->theme->baseUrl ?>/img/slides/9.png" alt=""></div>
            </li>




        </ul>
    </div>
</div>
<div style="border-bottom: 0px solid #ccc;">
</div>




<div class="container">


    <div class="row" style="margin-top: 30px">
        <div class="col-md-3">
            <div class="heading heading-border heading-bottom-double-border">
                <h2>ข่าว<strong>ประชาสัมพันธ์</strong></h2>
            </div>
            <ul class="nav nav-list mb-xl show-bg-active">
                <li><a data-hash="" data-hash-offset="85" href="<?=Url::toRoute(['/content', 'ContentSearch[cat_id]'=>2])?>"><span class="badge badge-danger pull-right"> 3</span><span class="label label-danger pull-right">New </span>ประชาสัมพันธ์กิจกรรมบริการ</a></li>
                <li><a data-hash="" data-hash-offset="85" href="<?=Url::toRoute(['/content', 'ContentSearch[cat_id]'=>17])?>"><span class="badge badge-warning pull-right">12</span>การดำเนินงานด้านสาธารณสุข</a></li>
                <li><a data-hash="" data-hash-offset="85" href="<?=Url::toRoute(['/content', 'ContentSearch[cat_id]'=>3])?>"><span class="badge badge-warning pull-right">2</span>รับสมัครงาน</a></li>
                <li><a data-hash="" data-hash-offset="85" href="<?=Url::toRoute(['/content', 'ContentSearch[cat_id]'=>4])?>"><span class="badge badge-warning pull-right">0</span>รับสมัครนักเรียนทุน</a></li>
                <li><a data-hash="" data-hash-offset="85" href="<?=Url::toRoute(['/content', 'ContentSearch[cat_id]'=>5])?>"><span class="badge badge-warning pull-right">2</span>ข่าวประกวดราคา</a></li>
            </ul>
        </div>


        <?php


        foreach ($models as $model) {

            ?>

            <div class="col-md-3">
                <div class="recent-posts">
                    <article class="post">
                        <div class="owl-carousel owl-theme nav-inside pull-left mr-lg mb-sm"
                             data-plugin-options='{"items": 1, "margin": 10, "animateOut": "fadeOut", "autoplay": true, "autoplayTimeout": 3000}'>
                            <?= $model->listImagesCarousel('content_file') ?>
                        </div>
                        <div class="date">
                            <span
                                class="day"><?= Yii::$app->thai->thaidate('j', strtotime($model->date_create)); ?></span>
                            <span
                                class="month"><?= Yii::$app->thai->thaidate('M', strtotime($model->date_create)); ?></span>
                        </div>
                        <h5>
                            <a href="<?= Url::toRoute(['/content/view', 'id' => $model->id]) ?>"><?= $model->subject ?></a>
                        </h5>

                        <p><?= mb_strimwidth($model->description, 0, 150, "[...]") ?><a
                                href="<?= Url::toRoute(['/content/view', 'id' => $model->id]) ?>" class="read-more"> .
                                อ่านต่อ <i class="fa fa-angle-right"></i></a></p>
                    </article>
                </div>
            </div>

            <?php
        }
        ?>
    </div>


</div>


<section class="section section-default">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="recent-posts mb-xl">
                    <h2>การดำเนินงาน<strong>สาธาณสุข</strong></h2>

                    <div class="row">





                            <?php

                            $i = 0;
                            foreach ($models_promote as $model_promote) {
                            $i++;


                                ?>


                                    <div class="col-md-6">
                                        <div class="recent-posts">
                                            <article class="post">
                                                <div class="owl-carousel owl-theme nav-inside pull-left mr-lg"
                                                     data-plugin-options='{"items": 1, "margin": 10, "animateOut": "fadeOut", "autoplay": true, "autoplayTimeout": 3000}'>
                                                    <?= $model_promote->listImagesCarousel('content_file') ?>
                                                </div>

                                                <h5>
                                                    <a href="<?= Url::toRoute(['/content/view', 'id' => $model_promote->id]) ?>"><?= $model_promote->subject ?></a>
                                                </h5>

                                            </article>
                                        </div>
                                    </div>




                                <?php
                            }
                            ?>



                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h2 class="label-hand"><strong>เรา</strong> "พร้อม" ดูแลสุขภาพ...</h2>
<hr class="hidden-xs">
                <div class="row">

                        <div>
                            <div class="col-md-12">
                                <div class="testimonial testimonial-primary">
                                    <blockquote>
                                        <p style="text-align: center">ประชาชนสุขภาพดี <br>เจ้าหน้าที่มีความสุข <br>ระบบสุขภาพยั่งยืน</p>
                                    </blockquote>
                                    <div class="testimonial-arrow-down"></div>
                                    <div class="testimonial-author">
                                        <div class="testimonial-author-thumbnail img-thumbnail">
                                            <img src="<?php echo $this->theme->baseUrl ?>/img/boss.jpg"
                                                 alt="" style="max-width: 120px">
                                        </div>
                                        <p><img src="<?php echo $this->theme->baseUrl ?>/img/apirak_sign.png"
                                                alt="" style="max-width: 120px"></p>
                                        <p><strong>นพ.อภิรักษ์ พิศุทธ์อาภรณ์</strong><span>นายแพทย์สาธารณสุขจังหวัดสระแก้ว</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>

            <div class="col-md-2">
                <h2>เกี่ยวกับ<strong>เรา</strong></h2>
                <ul class="nav nav-list mb-xl show-bg-active">
                    <li><a data-hash="" data-hash-offset="85" href="<?=Url::toRoute(['/about', 'ContentSearch[cat_id]'=>2])?>"><i class="fa fa-check-circle pull-right"></i>ประวัติความเป็นมา</a></li>
                    <li><a data-hash="" data-hash-offset="85" href="<?=Url::toRoute(['/about', 'ContentSearch[cat_id]'=>17])?>"><i class="fa fa-check-circle pull-right"></i>วิสัยทัศน์ พันธกิจ</a></li>
                    <li><a data-hash="" data-hash-offset="85" href="<?=Url::toRoute(['/about', 'ContentSearch[cat_id]'=>3])?>"><i class="fa fa-check-circle pull-right"></i>โครงสร้างองค์กร</a></li>
                    <li><a data-hash="" data-hash-offset="85" href="<?=Url::toRoute(['/about', 'ContentSearch[cat_id]'=>4])?>"><i class="fa fa-check-circle pull-right"></i>ผู้บริหาร</a></li>
                    <li><a data-hash="" data-hash-offset="85" href="<?=Url::toRoute(['/about', 'ContentSearch[cat_id]'=>5])?>"><i class="fa fa-check-circle pull-right"></i>อำนาจหน้าที่</a></li>
                    <li><a data-hash="" data-hash-offset="85" href="<?=Url::toRoute(['/about', 'ContentSearch[cat_id]'=>5])?>"><i class="fa fa-check-circle pull-right"></i>ยุทธศาสตร์สุขภาพ</a></li>
                    <li><a data-hash="" data-hash-offset="85" href="<?=Url::toRoute(['/about', 'ContentSearch[cat_id]'=>5])?>"><i class="fa fa-check-circle pull-right"></i>แผนงานโครงการ</a></li>
                    <li><a data-hash="" data-hash-offset="85" href="<?=Url::toRoute(['/about', 'ContentSearch[cat_id]'=>5])?>"><i class="fa fa-check-circle pull-right"></i>ผลงานเด่น</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>


<div class="container">

    <div class="row center">
        <div class="col-md-12">
            <h1 class="mb-sm word-rotator-title">
                สสจ.สระแก้ว
                <strong class="inverted">
									<span class="word-rotate" data-plugin-options='{"delay": 4000, "animDelay": 600}'>
										<span class="word-rotate-items">
											<span>ยิ้มต้อนรับ</span>
											<span>กระชับฉับไว</span>
											<span>ใส่ใจมุ่งมั่น</span>
                                            <span>สร้างสรรค์บริการ</span>
										</span>
									</span>
                </strong>
                เพื่อสุขภาวะที่ดีของประชาชนชาวสระแก้ว.
            </h1>

            <p>
                ค่านิยมร่วม <b>STAR</b> : <b>S</b>mile ยิ้มแย้มแจ่มใส บริการด้วยรอยยิ้ม, <b>T</b>ime ตรงเวลา บริหารเวลา,
                <b>A</b>ttention มุ่งมั่น ตั้งใจ, <b>R</b>e-Think คิดนอกกรอบ สร้างสรรค์
            </p>
        </div>
    </div>

</div>


<div class="home-concept">
    <div class="container">

        <div class="row center">
            <span class="sun"></span>
            <span class="cloud"></span>

            <div class="col-md-2 col-md-offset-1">
                <div class="process-image appear-animation" data-appear-animation="bounceIn">
                    <img src="<?php echo $this->theme->baseUrl ?>/img/home-concept-item-1.png" alt=""/>
                    <a href="#"><strong>กำหนดยุทธศาสตร์</strong></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="process-image appear-animation" data-appear-animation="bounceIn"
                     data-appear-animation-delay="200">
                    <img src="<?php echo $this->theme->baseUrl ?>/img/home-concept-item-2.png" alt=""/>
                    <a href="#"><strong>วางแผน</strong></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="process-image appear-animation" data-appear-animation="bounceIn"
                     data-appear-animation-delay="400">
                    <img src="<?php echo $this->theme->baseUrl ?>/img/home-concept-item-3.png" alt=""/>
                    <a href="<?=Url::toRoute(['/content', 'ContentSearch[cat_id]'=>17])?>"><strong>ดำเนินงาน</strong></a>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-1">
                <div class="project-image">
                    <div id="fcSlideshow" class="fc-slideshow">
                        <ul class="fc-slides">
                            <li><a href="portfolio-single-project.html"><img class="img-responsive"
                                                                             src="<?php echo $this->theme->baseUrl ?>/img/projects/project-home-1.jpg"
                                                                             alt=""/></a></li>
                            <li><a href="portfolio-single-project.html"><img class="img-responsive"
                                                                             src="<?php echo $this->theme->baseUrl ?>/img/projects/project-home-2.jpg"
                                                                             alt=""/></a></li>
                            <li><a href="portfolio-single-project.html"><img class="img-responsive"
                                                                             src="<?php echo $this->theme->baseUrl ?>/img/projects/project-home-3.jpg"
                                                                             alt=""/></a></li>
                        </ul>
                    </div>
                    <a href="#"><strong class="our-work">ผลงานของเรา</strong></a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container">

    <div class="row">
        <hr class="tall">
    </div>

</div>


<div class="container">


    <div class="row center">
        <div class="owl-carousel owl-theme"
             data-plugin-options='{"items": 6, "autoplay": true, "autoplayTimeout": 3000}'>
            <div>
                <a href="http://www.moph.go.th"><img class="img-responsive" src="<?php echo $this->theme->baseUrl ?>/img/logos/logo-1.png" alt=""></a>

            </div>
            <div>
                <a href="http://www.ddc.moph.go.th/"><img class="img-responsive" src="<?php echo $this->theme->baseUrl ?>/img/logos/logo-2.png" alt=""></a>

            </div>
            <div>
                <a href="http://www.dtam.moph.go.th/"><img class="img-responsive" src="<?php echo $this->theme->baseUrl ?>/img/logos/logo-3.png" alt=""></a>

            </div>
            <div>
                <a href="http://www.dms.moph.go.th/"><img class="img-responsive" src="<?php echo $this->theme->baseUrl ?>/img/logos/logo-4.png" alt=""></a>

            </div>
            <div>
                <a href="http://www.anamai.moph.go.th/"><img class="img-responsive" src="<?php echo $this->theme->baseUrl ?>/img/logos/logo-5.png" alt=""></a>

            </div>
            <div>
                <a href="http://www.dmsc.moph.go.th/"><img class="img-responsive" src="<?php echo $this->theme->baseUrl ?>/img/logos/logo-6.png" alt=""></a>

            </div>
            <div>
                <a href="http://www.hss.moph.go.th/"><img class="img-responsive" src="<?php echo $this->theme->baseUrl ?>/img/logos/logo-7.png" alt=""></a>

            </div>
            <div>
                <a href="http://www.dmh.go.th/"><img class="img-responsive" src="<?php echo $this->theme->baseUrl ?>/img/logos/logo-8.png" alt=""></a>

            </div>
            <div>
                <a href="http://www.fda.moph.go.th/"><img class="img-responsive" src="<?php echo $this->theme->baseUrl ?>/img/logos/logo-9.png" alt=""></a>

            </div>
        </div>
    </div>
</div>

