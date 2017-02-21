<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

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
    <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"gridwidth": 1170, "gridheight": 500}'>
        <ul>
            <li data-transition="fade">
                <img src="<?php echo $this->theme->baseUrl ?>/img/slides/slide-bg.jpg"
                     alt=""
                     data-bgposition="center center"
                     data-bgfit="cover"
                     data-bgrepeat="no-repeat"
                     class="rev-slidebg">

                <div class="tp-caption"
                     data-x="177"
                     data-y="180"
                     data-start="1000"
                     data-transform_in="x:[-300%];opacity:0;s:500;"><img src="<?php echo $this->theme->baseUrl ?>/img/slides/slide-title-border.png" alt=""></div>

                <div class="tp-caption top-label"
                     data-x="227"
                     data-y="180"
                     data-start="500"
                     data-transform_in="y:[-300%];opacity:0;s:500;">DO YOU NEED A NEW</div>

                <div class="tp-caption"
                     data-x="480"
                     data-y="180"
                     data-start="1000"
                     data-transform_in="x:[300%];opacity:0;s:500;"><img src="<?php echo $this->theme->baseUrl ?>/img/slides/slide-title-border.png" alt=""></div>

                <div class="tp-caption main-label"
                     data-x="135"
                     data-y="210"
                     data-start="1500"
                     data-whitespace="nowrap"
                     data-transform_in="y:[100%];s:500;"
                     data-transform_out="opacity:0;s:500;"
                     data-mask_in="x:0px;y:0px;">WEB DESIGN?</div>

                <div class="tp-caption bottom-label"
                     data-x="185"
                     data-y="280"
                     data-start="2000"
                     data-transform_in="y:[100%];opacity:0;s:500;">Check out our options and features.</div>

                <div class="tp-caption"
                     data-x="910"
                     data-y="248"
                     data-start="2500"
                     data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1300;"><img src="<?php echo $this->theme->baseUrl ?>/img/slides/slide-concept-2-1.png" alt=""></div>

                <div class="tp-caption"
                     data-x="960"
                     data-y="200"
                     data-start="3500"
                     data-transform_in="y:[300%];opacity:0;s:300;"><img src="<?php echo $this->theme->baseUrl ?>/img/slides/slide-concept-2-2.png" alt=""></div>

                <div class="tp-caption"
                     data-x="930"
                     data-y="170"
                     data-start="3650"
                     data-transform_in="y:[300%];opacity:0;s:300;"><img src="<?php echo $this->theme->baseUrl ?>/img/slides/slide-concept-2-3.png" alt=""></div>

                <div class="tp-caption"
                     data-x="880"
                     data-y="130"
                     data-start="3750"
                     data-transform_in="y:[300%];opacity:0;s:300;"><img src="<?php echo $this->theme->baseUrl ?>/img/slides/slide-concept-2-4.png" alt=""></div>

                <div class="tp-caption"
                     data-x="610"
                     data-y="80"
                     data-start="3950"
                     data-transform_in="y:[300%];opacity:0;s:300;"><img src="<?php echo $this->theme->baseUrl ?>/img/slides/slide-concept-2-5.png" alt=""></div>

                <div class="tp-caption blackboard-text"
                     data-x="640"
                     data-y="300"
                     data-start="3950"
                     style="font-size: 37px;"
                     data-transform_in="y:[300%];opacity:0;s:300;">Think</div>

                <div class="tp-caption blackboard-text"
                     data-x="665"
                     data-y="350"
                     data-start="4150"
                     style="font-size: 47px;"
                     data-transform_in="y:[300%];opacity:0;s:300;">Outside</div>

                <div class="tp-caption blackboard-text"
                     data-x="690"
                     data-y="400"
                     data-start="4350"
                     style="font-size: 32px;"
                     data-transform_in="y:[300%];opacity:0;s:300;">The box :)</div>
            </li>
            <li data-transition="fade">
                <img src="<?php echo $this->theme->baseUrl ?>/img/slides/slide-bg.jpg"
                     alt=""
                     data-bgposition="center center"
                     data-bgfit="cover"
                     data-bgrepeat="no-repeat"
                     class="rev-slidebg" data-no-retina>

                <div class="tp-caption top-label"
                     data-x="155"
                     data-y="100"
                     data-start="500"
                     data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"><img src="<?php echo $this->theme->baseUrl ?>/img/slides/slide-concept.png" alt=""></div>

                <div class="tp-caption blackboard-text"
                     data-x="285"
                     data-y="180"
                     data-start="1000"
                     style="font-size: 30px;"
                     data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;">easy to</div>

                <div class="tp-caption blackboard-text"
                     data-x="285"
                     data-y="220"
                     data-start="1200"
                     style="font-size: 40px;"
                     data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;">customize!</div>

                <div class="tp-caption main-label"
                     data-x="685"
                     data-y="190"
                     data-start="1800"
                     data-whitespace="nowrap"
                     data-transform_in="y:[100%];s:500;"
                     data-transform_out="opacity:0;s:500;"
                     data-mask_in="x:0px;y:0px;">DESIGN IT!</div>

                <div class="tp-caption bottom-label"
                     data-x="685"
                     data-y="250"
                     data-start="2000"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;s:600;e:Power4.easeInOut;"
                     data-transform_out="opacity:0;s:500;"
                     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                     data-splitin="chars"
                     data-splitout="none"
                     data-responsive_offset="on"
                     data-elementdelay="0.05">Create slides with brushes and fonts</div>

            </li>
        </ul>
    </div>
</div>


<div class="container">


    <div class="row" style="margin-top: 30px">



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

                    </article>
                </div>
            </div>

            <?php
        }
        ?>
    </div>


</div>


<div class="row">
    <hr class="tall">
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

