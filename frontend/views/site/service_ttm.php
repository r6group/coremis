<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Service';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('http://maps.google.com/maps/api/js?sensor=false', ['depends' => [\yii\web\JqueryAsset::className()]]); // กรณีเอาไว้ใต้ jquery
//$this->registerCssFile(Url::to('@web/gallery-lib/css/blueimp-gallery.min.css'));

$this->registerJs("


			/*
			Map Settings

				Find the Latitude and Longitude of your address:
					- http://universimmedia.pagesperso-orange.fr/geo/loc.htm
					- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

			*/


			// Map Initial Location
			var initLatitude = 13.74238656;
			var initLongitude = 102.32897758;


			// Map Markers
			var mapMarkers = [{
				latitude: initLatitude,
				longitude: initLongitude,
				html: '<strong>โรงพยาบาลวัฒนานคร(สาขาแพทย์แผนไทย)</strong><br>อ.วัฒนานคร, จ.สระแก้ว',
				icon: {
					image: '".$this->theme->baseUrl."/img/pin.png',
					iconsize: [26, 46],
					iconanchor: [12, 46]
				},
				popup: true
			}];



			// Map Extended Settings
			var mapSettings = {
				controls: {
					draggable: (($.browser.mobile) ? false : true),
					panControl: true,
					zoomControl: true,
					mapTypeControl: true,
					scaleControl: true,
					streetViewControl: true,
					overviewMapControl: true
				},
				scrollwheel: false,
				markers: mapMarkers,
				latitude: initLatitude,
				longitude: initLongitude,
				zoom: 15
			};

			var map = $('#googlemaps').gMap(mapSettings),
				mapRef = $('#googlemaps').data('gMap.reference');

			// Create an array of styles.
			var mapColor = '#0088cc';

			var styles = [{
    stylers: [{
        hue: mapColor
				}]
			}, {
    featureType: 'road',
				elementType: 'geometry',
				stylers: [{
        lightness: 0
				}, {
        visibility: 'simplified'
				}]
			}, {
    featureType: 'road',
				elementType: 'labels',
				stylers: [{
        visibility: 'off'
				}]
			}];

			var styledMap = new google.maps.StyledMapType(styles, {
				name: 'Styled Map'
			});

			mapRef.mapTypes.set('map_style', styledMap);
			mapRef.setMapTypeId('map_style');

", yii\web\View::POS_END, 'blueimp');
?>



<div class="container">

					<div class="row">
						<div class="col-md-12">
							<div class="owl-carousel owl-theme mb-none" data-plugin-options='{"items": 1, "animateOut": "fadeOut", "autoplay": true, "autoplayTimeout": 3000}'>
								<div>
									<img alt="" class="img-responsive img-rounded" src="<?php echo $this->theme->baseUrl ?>/img/banner.jpg">
								</div>

							</div>
						</div>
					</div>

					<hr class="tall">

					<div class="row">
						<div class="col-md-7">
							<h2>แพทย์แผนไทย จังหวัดสระแก้ว</h2>
							<p>จังหวัดสระแก้ว มีสถานบริการสาธารณสุข  ประกอบด้วย โรงพยาบาลทั่วไป 1 แห่ง โรงพยาบาลชุมชน 6 แห่ง  มีแพทย์แผนไทยและแพทย์แผนไทยประยุกต์ปฏิบัติงานครบทุกแห่ง มีจำนวน  รพ.สต. 110 แห่ง มีแพทย์แผนไทยปฏิบัติงาน จำนวน 9 แห่ง สถานบริการเปิดบริการแพทย์แผนไทยครอบคลุมทุกแห่ง  จัดให้บริการ นวด อบ ประคบ ยาสมุนไพร จำนวน  112 แห่ง  จัดให้บริการยาสมุนไพร จำนวน 5 แห่ง จัดบริการผ่านเกณฑ์มาตรฐานครอบคลุมทุกแห่ง มีผู้ช่วยแพทย์แผนไทย 130 คน กลุ่มหมอพื้นบ้าน 226 คน กลุ่มนักวิชาการ  11 คน
								กลุ่มองค์กรเอกชนพัฒนาด้านการแพทย์แผนไทย 2 คน  กลุ่มผู้ผลิตและจำหน่ายยาแผนไทย 12 คน
								กลุ่มผู้ปลูกหรือแปรรูปสมุนไพร 40 คน  กลุ่มผู้ประกอบโรคศิลปะ 17 คน</p>


							<h2>โรงพยาบาลวัฒนานคร(สาขาแพทย์แผนไทย)</h2>
							<ul class="list list-icons">
								<li><i class="fa fa-check"></i> ได้รับการสนับสนุนจากกรมพัฒนาการแพทย์แผนไทยฯ จัดตั้งเป็น ศูนย์ส่งเสริมสุขภาพแผนไทย.</li>
								<li><i class="fa fa-check"></i> ได้รับการคัดเลือกให้เป็น 1 ใน 3 โครงการศึกษารูปแบบ รพ.แพทย์แผนไทย.</li>
								<li><i class="fa fa-check"></i> เปิดให้บริการ 1 ตุลาคม 2547  เน้นการจัดบริการในรูปแบบศูนย์ส่งเสริมสุขภาพแผนไทย.</li>
								<li><i class="fa fa-check"></i> เน้นการบำบัดรักษาโรคด้วยการแพทย์แผนไทย เปิดเฉพาะ OPD.</li>
								<li><i class="fa fa-check"></i> ได้รับเลือกให้เป็น 1 ใน 9 แห่ง.</li>
								<li><i class="fa fa-check"></i> โรงพยาบาลแพทย์แผนไทยต้นแบบ ของกระทรวงสาธารณสุขเริ่มเปิดให้บริการผู้ป่วยในแพทย์แผนไทย ในวันที่ 19 ก.ค.2553.</li>
								<li><i class="fa fa-check"></i> จัดให้บริการผู้ป่วยนอกและผู้ป่วยใน โรคเรื้อรังเบาหวานความดันโลหิตสูง  โรคหลอดเลือดสมอง บริการฝังเข็ม เป็นศูนย์ฝึกอบรมหลักสูตรผู้ช่วยแพทย์แผนไทยเครือข่ายบริการสุขภาพที่ 6  เป็นแหล่งฝึกประสบการณ์วิชาชีพด้านการแพทย์แผนไทย ของนักศึกษา 5 สถาบัน  ปีละประมาณ   50 คน ให้บริการท่องเที่ยวเชิงสุขภาพ (นวดสปา ผลิตภัณฑ์เพื่อสุขภาพ).</li>
							</ul>


							<div class="row pt-lg">
								<div class="col-md-12">
									<h2>บริการ</h2>
									<div class="row">
										<div class="col-sm-6">
											<div class="feature-box">
												<div class="feature-box-icon">
													<i class="fa fa-group"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="heading-primary mb-none">ตรวจวินิจฉัยโรค</h4>
													<p class="tall">ตรวจวินิจฉัยโรคด้วยแพทย์แผนปัจจุบันและแพทย์แผนไทยประยุกต์.</p>
												</div>
											</div>
											<div class="feature-box">
												<div class="feature-box-icon">
													<i class="fa fa-file"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="heading-primary mb-none">ยาสมุนไพร</h4>
													<p class="tall">จ่ายยาสมุนไพรเพื่อการบำบัด.</p>
												</div>
											</div>
											<div class="feature-box">
												<div class="feature-box-icon">
													<i class="fa fa-google-plus"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="heading-primary mb-none">นวดเพื่อบำบัด</h4>
													<p class="tall">นวดเพื่อบำบัดอาการ การนวดเพื่อฟื้นฟูสภาพ .</p>
												</div>
											</div>
											<div class="feature-box">
												<div class="feature-box-icon">
													<i class="fa fa-adjust"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="heading-primary mb-none">นวดเพื่อส่งเสริมสุขภาพ</h4>
													<p class="tall">นวดเพื่อส่งเสริมสุขภาพ.</p>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="feature-box">
												<div class="feature-box-icon">
													<i class="fa fa-film"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="heading-primary mb-none">นวดเท้า</h4>
													<p class="tall">นวดเท้าเพื่อสุขภาพ.</p>
												</div>
											</div>
											<div class="feature-box">
												<div class="feature-box-icon">
													<i class="fa fa-user"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="heading-primary mb-none">อบสมุนไพร</h4>
													<p class="tall">อบสมุนไพรเพื่อสุขภาพ.</p>
												</div>
											</div>
											<div class="feature-box">
												<div class="feature-box-icon">
													<i class="fa fa-bars"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="heading-primary mb-none">ประคบสมุนไพร</h4>
													<p class="tall">ประคบสมุนไพรเพื่อสุขภาพ.</p>
												</div>
											</div>
											<div class="feature-box">
												<div class="feature-box-icon">
													<i class="fa fa-desktop"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="heading-primary mb-none">จำหน่ายยาสมุนไพร</h4>
													<p class="tall">จำหน่ายยาสมุนไพร ผลิตภัณฑ์สมุนไพรและผลิตภัณฑ์เพื่อสุขภาพ.</p>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>



							<hr class="tall">

							<h4>Work <strong>Space</strong></h4>

							<div data-plugin-lightbox data-plugin-options='{"delegate": "a", "type": "image", "gallery": {"enabled": true}}'>
								<div class="row">
									<div class="col-md-4">
										<a class="img-thumbnail mb-xl" href="img/our-office-1.jpg" data-plugin-options='{"type":"image"}'>
											<img class="img-responsive" src="<?php echo $this->theme->baseUrl ?>/img/our-office-1.jpg" alt="Office">
											<span class="zoom">
												<i class="fa fa-search"></i>
											</span>
										</a>
									</div>
									<div class="col-md-4">
										<a class="img-thumbnail mb-xl" href="img/our-office-2.jpg" data-plugin-options='{"type":"image"}'>
											<img class="img-responsive" src="<?php echo $this->theme->baseUrl ?>/img/our-office-2.jpg" alt="Office">
											<span class="zoom">
												<i class="fa fa-search"></i>
											</span>
										</a>
									</div>
									<div class="col-md-4">
										<a class="img-thumbnail mb-xl" href="img/our-office-3.jpg" data-plugin-options='{"type":"image"}'>
											<img class="img-responsive" src="<?php echo $this->theme->baseUrl ?>/img/our-office-3.jpg" alt="Office">
											<span class="zoom">
												<i class="fa fa-search"></i>
											</span>
										</a>
									</div>
								</div>
							</div>

						</div>
						<div class="col-md-5">
							<h4>ที่อยู่</h4>

							<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
							<div id="googlemaps" class="google-map small"></div>

							<ul class="list list-icons list-icons-style-3 mt-xlg">
								<li><i class="fa fa-map-marker"></i> <strong>Address:</strong> โรงพยาบาลวัฒนานคร(สาขาแพทย์แผนไทย), อ.วัฒนานคร จ.สระแก้ว 27160</li>
								<li><i class="fa fa-phone"></i> <strong>Phone:</strong> (037) 261-346</li>
								<li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>
							</ul>

							<hr>


								<h4>อัตราค่าบริการ</h4>
								<ul class="list list-icons list-dark mt-xlg">
									<li><i class="fa fa-caret-right"></i> การนวดเพื่อบำบัดอาการ การนวดเพื่อฟื้นฟูสภาพ 150-200 บาท</li>
									<li><i class="fa fa-caret-right"></i> การนวดเพื่อส่งเสริมสุขภาพ 150 บาท</li>
								</ul>

							<hr>

							<h4>เวลาเปิดให้บริการ</h4>
							<ul class="list list-icons list-dark mt-xlg">
								<li><i class="fa fa-clock-o"></i> วันจันทร์-วันพฤหัสบดี เวลา 08.30 – 20.30 น.</li>
								<li><i class="fa fa-clock-o"></i> วันศุกร์ เวลาราชการ 08-30 - 16.30 น.</li>
							</ul>
						</div>
					</div>

				</div>