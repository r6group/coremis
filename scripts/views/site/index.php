<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */
$this->title = 'HealthScript';
?>

<!-- BEGIN INTRO SECTION -->
<section id="intro">
    <!-- Slider BEGIN -->
    <div class="page-slider">
        <div class="fullwidthbanner-container revolution-slider">
            <div class="banner">
                <ul id="revolutionul">


                    <!-- THE NEW SLIDE -->
                    <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="6000" data-thumb="">
                        <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                        <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/bg/bg_slider2.jpg" alt="">

                        <div class="caption lft tp-resizeme"
                             data-x="center"
                             data-y="center"
                             data-hoffset="-290"
                             data-voffset="-80"
                             data-speed="900"
                             data-start="1000"
                             data-easing="easeOutExpo">
                            <img class="logo-default" src="<?= Url::to('@web') ?>/images/hs_logo_white.png" alt="Logo"><br>
                            <p class="subtitle-v1">   Health Information Exchange (HIE) Toolkit</p>


                        </div>
                        <div class="caption lft tp-resizeme"
                             data-x="center"
                             data-y="center"
                             data-hoffset="-460"
                             data-voffset="40"
                             data-speed="900"
                             data-start="1500"
                             data-easing="easeOutExpo">
                            <p class="subtitle-v2">Available in:</p>
                        </div>
                        <a href="#" class="caption lft tp-resizeme slide_thumb_img slide_border"
                           data-x="center"
                           data-y="center"
                           data-hoffset="-370"
                           data-voffset="36"
                           data-speed="900"
                           data-start="1500"
                           data-easing="easeOutExpo">
                            <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/widgets/icon_android.png" alt="Image 1">
                            |
                        </a>
                        <a href="#" class="caption lft tp-resizeme slide_thumb_img"
                           data-x="center"
                           data-y="center"
                           data-hoffset="-318"
                           data-voffset="36"
                           data-speed="900"
                           data-start="1500"
                           data-easing="easeOutExpo">
                            <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/widgets/icon_ios.png" alt="Image 2">
                        </a>
                        <div class="caption lfb tp-resizeme"
                             data-x="right"
                             data-y="bottom"
                             data-hoffset="80"
                             data-speed="900"
                             data-start="2000"
                             data-easing="easeOutExpo">
                            <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/widgets/device.png" alt="Image 3">
                        </div>
                        <div class="caption lft tp-resizeme"
                             data-x="center"
                             data-y="center"
                             data-hoffset="-368"
                             data-voffset="110"
                             data-speed="900"
                             data-start="2000"
                             data-easing="easeOutExpo">
                            <a href="#download" class="btn btn-warning"><h4>Download HealthScript 1.15.2.28 >></h4></a>
                        </div>
                    </li>


                    <!-- THE NEW SLIDE -->
                    <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="6000" data-thumb="">
                        <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                        <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/bg/bg_slider1.jpg" alt="">

                        <div class="caption lft tp-resizeme"
                             data-x="center"
                             data-y="center"
                             data-hoffset="-290"
                             data-voffset="-80"
                             data-speed="900"
                             data-start="1000"
                             data-easing="easeOutExpo">
                            <img class="logo-default" src="<?= Url::to('@web') ?>/images/hs_logo_white.png" alt="Logo"><br>
                            <p class="subtitle-v1">   Health Information Exchange (HIE) Toolkit</p>


                        </div>
                        <div class="caption lft tp-resizeme"
                             data-x="center"
                             data-y="center"
                             data-hoffset="-460"
                             data-voffset="40"
                             data-speed="900"
                             data-start="1500"
                             data-easing="easeOutExpo">
                            <p class="subtitle-v2">Available in:</p>
                        </div>
                        <a href="#" class="caption lft tp-resizeme slide_thumb_img slide_border"
                           data-x="center"
                           data-y="center"
                           data-hoffset="-370"
                           data-voffset="36"
                           data-speed="900"
                           data-start="1500"
                           data-easing="easeOutExpo">
                            <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/widgets/icon_android.png" alt="Image 1">
                            |
                        </a>
                        <a href="#" class="caption lft tp-resizeme slide_thumb_img"
                           data-x="center"
                           data-y="center"
                           data-hoffset="-318"
                           data-voffset="36"
                           data-speed="900"
                           data-start="1500"
                           data-easing="easeOutExpo">
                            <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/widgets/icon_ios.png" alt="Image 2">
                        </a>
                        <div class="caption lfb tp-resizeme"
                             data-x="right"
                             data-y="bottom"
                             data-hoffset="50"
                             data-speed="900"
                             data-start="2500"
                             data-easing="easeOutExpo">
                            <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/member/men.png" alt="Image 3">
                        </div>
                        <div class="caption lft tp-resizeme"
                             data-x="center"
                             data-y="center"
                             data-hoffset="-368"
                             data-voffset="110"
                             data-speed="900"
                             data-start="2000"
                             data-easing="easeOutExpo">
                            <a href="#download" class="btn btn-warning"><h4>Download HealthScript 1.15.2.28 >></h4></a>
                        </div>
                    </li>




                </ul>
            </div>
        </div>
    </div>
    <!-- Slider END -->
</section>
<!-- END INTRO SECTION -->

<!-- BEGIN MAIN LAYOUT -->
<div class="page-content">
    <!-- SUBSCRIBE BEGIN -->
    <div class="subscribe">
        <div class="container">
            <div class="subscribe-wrap">
                <div class="subscribe-body subscribe-desc md-margin-bottom-30">
                    <h1>Signup for free</h1>
                    <p>To try the most advanced business platform for mobile and desktop</p>
                </div>
                <div class="subscribe-body">
                    <form class="form-wrap input-field">
                        <div class="form-wrap-group">
                            <input type="name" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="form-wrap-group border-left-transparent">
                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                        </div>
                        <div class="form-wrap-group">
                            <button type="submit" class="btn-danger btn-md btn-block">Signup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- SUBSCRIBE END -->

    <!-- BEGIN ABOUT SECTION -->
    <section id="about">
        <!-- Services BEGIN -->
        <div class="container service-bg">
            <div class="row">
                <div class="col-sm-4">
                    <div class="services sm-margin-bottom-100">
                        <div class="services-wrap">
                            <div class="service-body">
                                <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/widgets/icon1.png" alt="">
                            </div>
                        </div>
                        <h2>HealthScript ช่วยในการแลกเปลี่ยนข้อมูล</h2>
                        <p>การแลกเปลี่ยนข้อมูลระหว่างหน่วยงานจะง่ายขึ้น รวดเร็วขึ้น ปลอดภัยขึ้น</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="services sm-margin-bottom-100">
                        <div class="services-wrap">
                            <div class="service-body">
                                <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/widgets/icon2.png" alt="">
                            </div>
                        </div>
                        <h2>ยืดหยุ่น ใช้ร่วมกับระบบที่หน่วยงานผู้ใช้มีอยู่</h2>
                        <p>ไม่ยึดติดกับการใช้ร่วมกัน Software ใด Software หนึ่ง รองรับรูปแบบข้อมูลได้หลายหลายชนิด และประยุกต์ใช้งานได้หลายรูปแบบ</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="services">
                        <div class="services-wrap">
                            <div class="service-body">
                                <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/widgets/icon3.png" alt="">
                            </div>
                        </div>
                        <h2>Great individual Design</h2>
                        <p>Lorem ipsum dolor consetuer <br> erat votpat dolore</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services END -->
    </section>
    <!-- END ABOUT SECTION -->

    <!-- BEGIN FEATURES SECTION -->
    <section id="features">
        <!-- Features BEGIN -->
        <div class="features-bg">
            <div class="container">
                <div class="heading">
                    <h2><strong>HealthScript</strong> Main Features</h2>
                    <p>ความสามารถของโปรแกรม สำหรับนำไปใช้ในระบบแลกเปลี่ยนข้อมูล</p>
                </div><!-- //end heading -->

                <!-- Features -->
                <div class="row margin-bottom-70">
                    <div class="col-md-6 md-margin-bottom-70">
                        <div class="features">
                            <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/widgets/screen1.png" alt="">
                            <div class="features-in">
                                <h3><a href="#">Universal Data Access</a></h3>
                                <p>รองรับข้อมูลหลากหลายรูปแบบ เช่น MySQL, SQL Server, Oracle, PostgreSQL, MS Access, CSV, TXT, XML, JSON เป็นต้น</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="features">
                            <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/widgets/screen2.png" alt="">
                            <div class="features-in">
                                <h3><a href="#">Security</a></h3>
                                <p>รองรับมาตรฐานความปลอดภัย HTTPS, SSL, FTPS, SHA256, MD5, Access Level Control etc.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- //end row -->
                <div class="row margin-bottom-80">
                    <div class="col-md-6 md-margin-bottom-70">
                        <div class="features">
                            <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/widgets/screen3.png" alt="">
                            <div class="features-in">
                                <h3><a href="#">Automatic</a></h3>
                                <p>สามารถกำหนดให้ทำงานในแบบอัตโนมัติ และกำหนดเงื่อนไขของการทำงานได้ตามต้องการ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="features">
                            <img src="<?= Url::to('@web') ?>/theme/frontend/onepage2/img/widgets/screen4.png" alt="">
                            <div class="features-in">
                                <h3><a href="#">Standard & Interoperability</a></h3>
                                <p>ใช้การประกาศมาตรฐานโครงสร้างข้อมูล มีการระบุโครงสร้างที่ชัดเจน ระหว่างผู้รับและผู้ส่ง เข้าใจได้ง่าย และป้องกันความผิดพลาดในการสื่อสารระหว่าง Application</p>
                            </div>
                        </div>
                    </div>
                </div><!-- //end row -->
                <!-- End Features -->

<!--                <center><a href="#" class="btn-brd-danger">Features ทั้งหมด</a></center>-->
            </div>
        </div>
        <!-- Features END -->
    </section>
    <!-- END FEATURES SECTION -->

    <!-- BEGIN TEAM SECTION -->
    <section id="download">
        <!-- Team BEGIN -->
        <div class="team-bg parallax">
            <div class="container">
                <div class="heading-light">
                    <h2><strong>Download</strong></h2>
                </div><!-- //end heading -->

                <div class="row">
                    <div class="col-md-7">

                        <div class="heading-left-light">
                            <h2>Change Logs</h2>
                            <p><b>HealthScript v. 1.15.2.18 (18 กพ. 58)</b>
                                <ul>
                                <li>แก้ไขปัญหา “Out of memory” และรองรับผลลัพธ์ข้อมูลขนาดใหญ่</li>
                                <li>แก้ไขปัญหาการ Loop ของ Auto Update โปรแกรม</li>
                                <li>ปรับปรุงรายการรหัสหน่วยงาน</li>
                                <li>แก้ปัญหา MCI Error กรณีเครื่องที่ไม่มี Sound Card</li>
                                <li>ปรับปรุงประสิทธิภาพและแก้ไขปัญหาอื่นๆ</li>
                            </ul>
                            </p>

                            <p><b>HealthScript v. 0.14.12.18 (18 ธค. 58)</b>
                            <ul>
                                <li>ปรับ Format ข้อมูล Date และ Datetime ให้ตรงตาม General date format ของ MySQL</li>
                                <li>อ้างอิงเวลาจาก Database Server แทนการใช้เวลาจาก Client</li>
                                <li>เพิ่มระบบ Auto Update สำหรับการปรับปรุงโปรแกรมโดยอัตโนมัติเมื่อมีเวอร์ชั่นใหม่</li>

                            </ul>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="team-about">
                            <h3>HealthScript Version ล่าสุด</h3>
                            <a href="https://drive.google.com/uc?export=download&id=0B-70TqjuXXfYamlCZlVYNWllczQ" class="btn btn-warning"><h4>Download HealthScript 1.15.2.28 >></h4></a>
                            <div class="margin-bottom-40"></div>
                            <h3>HealthScript Editor</h3>
                            <a href="https://drive.google.com/uc?export=download&id=0B-70TqjuXXfYcHlRaERoRFZGX2c" class="btn btn-warning"><h4>Download HealthScript Editor >></h4></a>
                            <div class="margin-bottom-40"></div>
                            <h3>Older Version</h3>
                            <p>Lorem niam ipsum dolor sit ammet adipiscing et suitem elit et nonuy nibh elit niam dolor suit elit amet nonummy nibh dolore onec placerat interdum purus.</p>

                        </div>
                    </div>
                </div><!-- //end row -->
            </div>
        </div>
        <!-- Team END -->
    </section>
    <!-- END TEAM SECTION -->

    <!-- BEGIN CLIENTS SECTION -->
<!--    <section id="clients">-->
<!--        <div class="clients">-->
<!--            <div class="clients-bg">-->
<!--                <div class="container">-->
<!--                    <div class="heading-blue">-->
<!--                        <h2>Over <strong>30.000</strong> Customers</h2>-->
<!--                        <p>and let's see what are they saying</p>-->
<!--                    </div>-->
                    <!-- //end heading -->

                    <!-- Owl Carousel -->
<!--                    <div class="owl-carousel">-->
<!--                        <div class="item" data-quote="#client-quote-1">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo1.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="item" data-quote="#client-quote-2">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo2.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="item" data-quote="#client-quote-3">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo3.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="item" data-quote="#client-quote-4">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo4.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="item" data-quote="#client-quote-5">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo5.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="item" data-quote="#client-quote-6">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo6.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="item" data-quote="#client-quote-7">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo7.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="item" data-quote="#client-quote-8">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo8.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="item" data-quote="#client-quote-9">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo9.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="item" data-quote="#client-quote-10">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo10.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="item" data-quote="#client-quote-11">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo11.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="item" data-quote="#client-quote-12">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo12.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="item" data-quote="#client-quote-13">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo13.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="item" data-quote="#client-quote-14">-->
<!--                            <img src="--><?//= Url::to('@web') ?><!--/theme/frontend/onepage2/img/clients/logo14.png" alt="">-->
<!--                        </div>-->
<!--                    </div>-->
                    <!-- End Owl Carousel -->
<!--                </div>-->
<!--            </div>-->

            <!-- Clients Quotes -->
<!--            <div class="clients-quotes">-->
<!--                <div class="container">-->
<!--                    <div class="client-quote" id="client-quote-1">-->
<!--                        <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit euismod tincidunt ut laoreet dolore magna aliquam dolor sit amet consectetuer elit</p>-->
<!--                        <h4>Mark Nilson</h4>-->
<!--                        <span>Director</span>-->
<!--                    </div>-->
<!--                    <div class="client-quote" id="client-quote-2">-->
<!--                        <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit euismod tincidunt aliquam dolor sit amet consectetuer elit</p>-->
<!--                        <h4>Lisa Wong</h4>-->
<!--                        <span>Artist</span>-->
<!--                    </div>-->
<!--                    <div class="client-quote" id="client-quote-3">-->
<!--                        <p>Lorem ipsum dolor sit amet consectetuer elit euismod tincidunt aliquam dolor sit amet elit</p>-->
<!--                        <h4>Nick Dalton</h4>-->
<!--                        <span>Developer</span>-->
<!--                    </div>-->
<!--                    <div class="client-quote" id="client-quote-4">-->
<!--                        <p>Fusce mattis vestibulum felis, vel semper mi interdum quis. Vestibulum ligula turpis, aliquam a molestie quis, gravida eu libero.</p>-->
<!--                        <h4>Alex Janmaat</h4>-->
<!--                        <span>Co-Founder</span>-->
<!--                    </div>-->
<!--                    <div class="client-quote" id="client-quote-5">-->
<!--                        <p>Vestibulum sodales imperdiet euismod.</p>-->
<!--                        <h4>Jeffrey Veen</h4>-->
<!--                        <span>Designer</span>-->
<!--                    </div>-->
<!--                    <div class="client-quote" id="client-quote-6">-->
<!--                        <p>Praesent sed sollicitudin mauris. Praesent eu metus laoreet, sodales orci nec, rutrum dui.</p>-->
<!--                        <h4>Inna Rose</h4>-->
<!--                        <span>Google</span>-->
<!--                    </div>-->
<!--                    <div class="client-quote" id="client-quote-7">-->
<!--                        <p>Sed ornare enim ligula, id imperdiet urna laoreet eu. Praesent eu metus laoreet, sodales orci nec, rutrum dui.</p>-->
<!--                        <h4>Jacob Nelson</h4>-->
<!--                        <span>Support</span>-->
<!--                    </div>-->
<!--                    <div class="client-quote" id="client-quote-8">-->
<!--                        <p>Adipiscing elit euismod tincidunt ut laoreet dolore magna aliquam dolor sit amet consectetuer elit</p>-->
<!--                        <h4>John Doe</h4>-->
<!--                        <span>Marketing</span>-->
<!--                    </div>-->
<!--                    <div class="client-quote" id="client-quote-9">-->
<!--                        <p>Nam euismod fringilla turpis vitae tincidunt, adipiscing elit euismod tincidunt aliquam dolor sit amet consectetuer elit</p>-->
<!--                        <h4>Michael Stawson</h4>-->
<!--                        <span>Graphic Designer</span>-->
<!--                    </div>-->
<!--                    <div class="client-quote" id="client-quote-10">-->
<!--                        <p>Quisque eget mi non enim efficitur fermentum id at purus.</p>-->
<!--                        <h4>Liam Nelsson</h4>-->
<!--                        <span>Actor</span>-->
<!--                    </div>-->
<!--                    <div class="client-quote" id="client-quote-11">-->
<!--                        <p>Integer et ante dictum, hendrerit metus eget, ornare massa.</p>-->
<!--                        <h4>Madison Klarsson</h4>-->
<!--                        <span>Director</span>-->
<!--                    </div>-->
<!--                    <div class="client-quote" id="client-quote-12">-->
<!--                        <p>Vestibulum sodales imperdiet euismod.</p>-->
<!--                        <h4>Ava Veen</h4>-->
<!--                        <span>Writer</span>-->
<!--                    </div>-->
<!--                    <div class="client-quote" id="client-quote-13">-->
<!--                        <p>Ut sit amet nisl nec dui lobortis gravida ut et neque. Praesent eu metus laoreet, sodales orci nec, rutrum dui.</p>-->
<!--                        <h4>Sophia Williams</h4>-->
<!--                        <span>Apple</span>-->
<!--                    </div>-->
<!--                    <div class="client-quote" id="client-quote-14">-->
<!--                        <p>Nam non vulputate orci. Duis sed mi nec ligula tristique semper vitae pretium nisi. Pellentesque nec enim vel magna pulvinar vulputate.</p>-->
<!--                        <h4>Melissa Korn</h4>-->
<!--                        <span>Reporter</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <!-- End Clients Quotes -->
<!--        </div>-->
<!--    </section>-->
    <!-- END CLIENTS SECTION -->


    <!-- BEGIN CONTACT SECTION -->
    <section id="contact">
        <!-- Footer -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="heading-left-light">
                            <h2>ติดต่อ HealthScript</h2>
                            <p>งานข้อมูลข่าวสารและเทคโนโลยีสารสนเทศ
                                <br> กลุ่มงานพัฒนายุทธศาสตร์สาธารณสุข<br>

                                <br> สำนักงานสาธารณสุขจังหวัดสระแก้ว
                                <br> 609 ม.2 ต.ท่าเกษม อ.เมืองสระแก้ว
                                <br> จ.สระแก้ว 27000

                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form">
                            <div class="form-wrap">
                                <div class="form-wrap-group">
                                    <input type="text" placeholder="ชื่อคุณ" class="form-control">
                                    <input type="text" placeholder="เรื่อง" class="border-top-transparent form-control">
                                </div>
                                <div class="form-wrap-group border-left-transparent">
                                    <input type="text" placeholder="Email ของคุณ" class="form-control">
                                    <input type="text" placeholder="หมาเลขโทรศัพท์ของคุณ" class="border-top-transparent form-control">
                                </div>
                            </div>
                        </div>
                        <textarea rows="8" name="message" placeholder="พิมพ์ข้อความ ..." class="border-top-transparent form-control"></textarea>
                        <button type="submit" class="btn-danger btn-md btn-block">ส่งข้อความ</button>
                    </div>
                </div><!-- //end row -->
            </div>
        </div>
        <!-- End Footer -->

        <!-- Footer Coypright -->
        <div class="footer-copyright">
            <div class="container">
                <h3>HealthScript</h3>
                <ul class="copyright-socials">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- End Footer Coypright -->
    </section>
    <!-- END CONTACT SECTION -->
</div>
<!-- END MAIN LAYOUT -->
<a href="#intro" class="go2top"><i class="fa fa-arrow-up"></i></a>
