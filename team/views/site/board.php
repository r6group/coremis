<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'ผู้บริหาร';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="container">

    <h2>Meet the <strong>Team</strong></h2>

    <ul class="nav nav-pills sort-source" data-sort-id="team" data-option-key="filter">
        <li data-option-value="*" class="active"><a href="#">แสดงทั้งหมด</a></li>
        <li data-option-value=".ceo"><a href="#">นพ.สสจ.</a></li>
        <li data-option-value=".leadership"><a href="#">รอง นพ.สสจ.</a></li>
        <li data-option-value=".manager"><a href="#">หัวหน้ากลุ่มงาน</a></li>

    </ul>

    <hr>

    <div class="row">

        <ul class="team-list sort-destination" data-sort-id="team">
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">
										<a href="about-me.html">
                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-1.jpg" class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">นพ.อภิรักษ์ พิศุทธ์อาภรณ์</span>
												<span class="thumb-info-type">นายแพทย์สาธารณสุขจังหวัดสระแก้ว</span>
											</span>
                                        </a>
									</span>
									<span class="thumb-info-caption">
										
										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item leadership">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">
										<a href="about-me.html">
                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-2.jpg" class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">พญ.อรรัตน์ จันทร์เพ็ญ</span>
												<span class="thumb-info-type">นายแพทย์ด้านเวชกรรมป้องกัน</span>
											</span>
                                        </a>
									</span>
									<span class="thumb-info-caption">
										
										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item leadership">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">
										<a href="about-me.html">
                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-3.jpg" class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">ยุภาพรรณ วรรณชัยวงศ์</span>
												<span class="thumb-info-type">นักวิชาการสาธารณสุข เชี่ยวชาญ</span>
											</span>
                                        </a>
									</span>
									<span class="thumb-info-caption">
										
										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item leadership">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">
										<a href="about-me.html">
                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-4.jpg" class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">ญาณี นาคพงษ์</span>
												<span class="thumb-info-type">นักวิชาการสาธาณสุข ชำนาญการพิเศษ</span>
											</span>
                                        </a>
									</span>
									<span class="thumb-info-caption">
										
										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">
										<a href="about-me.html">
                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-5.jpg" class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">Robert Doe</span>
												<span class="thumb-info-type">Design</span>
											</span>
                                        </a>
									</span>
									<span class="thumb-info-caption">
										
										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">
										<a href="about-me.html">
                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-6.jpg" class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">Melissa Doe</span>
												<span class="thumb-info-type">Marketing</span>
											</span>
                                        </a>
									</span>
									<span class="thumb-info-caption">
										
										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">
										<a href="about-me.html">
                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-7.jpg" class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">Will Doe</span>
												<span class="thumb-info-type">Developer</span>
											</span>
                                        </a>
									</span>
									<span class="thumb-info-caption">
										
										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">
										<a href="about-me.html">
                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-8.jpg" class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">Jerry Doe</span>
												<span class="thumb-info-type">Developer</span>
											</span>
                                        </a>
									</span>
									<span class="thumb-info-caption">
										
										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
            </li>
        </ul>

    </div>

</div>