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
			var initLatitude = 13.79801103;
			var initLongitude = 102.13756442;


			// Map Markers
			var mapMarkers = [{
				latitude: initLatitude,
				longitude: initLongitude,
				html: '<strong>สำนักงานสาธารณสุขจังหวัดสระแก้ว</strong>',
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
									<img alt="" class="img-responsive img-rounded" src="<?php echo $this->theme->baseUrl ?>/img/banner2.jpg">
								</div>

							</div>
						</div>
					</div>

					<hr class="tall">

					<div class="row">
						<div class="col-md-7">
							<h2>คลินิกทันตกรรม สำนักงานสาธารณสุขจังหวัดสระแก้ว</h2>



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
													<h4 class="heading-primary mb-none">ขูดหินปูน</h4>

												</div>
											</div>
											<div class="feature-box">
												<div class="feature-box-icon">
													<i class="fa fa-file"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="heading-primary mb-none">อุดฟัน</h4>

												</div>
											</div>
											<div class="feature-box">
												<div class="feature-box-icon">
													<i class="fa fa-google-plus"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="heading-primary mb-none">ถอนฟัน</h4>

												</div>
											</div>

										</div>
										<div class="col-sm-6">
											<div class="feature-box">
												<div class="feature-box-icon">
													<i class="fa fa-adjust"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="heading-primary mb-none">รักษารากฟัน</h4>

												</div>
											</div>
											<div class="feature-box">
												<div class="feature-box-icon">
													<i class="fa fa-film"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="heading-primary mb-none">ใส่ฟันปลอม</h4>
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
								<li><i class="fa fa-map-marker"></i> <strong>Address:</strong> สำนักงานสาธารณสุขจังหวัดสระแก้ว, อ.เมืองสระแก้ว จ.สระแก้ว 27000</li>
								<li><i class="fa fa-phone"></i> <strong>Phone:</strong> 092-0256-7102</li>
								<li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>
							</ul>

							<hr>


								<h4>อัตราค่าบริการ</h4>
								<ul class="list list-icons list-dark mt-xlg">
									<li><i class="fa fa-caret-right"></i> ขูดหินปูน 150-200 บาท</li>
								</ul>

							<hr>

							<h4>เวลาเปิดให้บริการ</h4>
							<ul class="list list-icons list-dark mt-xlg">
								<li><i class="fa fa-clock-o"></i> วันอังคาร-วันพุธ เวลา 16.30 – 20.30 น.</li>
							</ul>
						</div>
					</div>

				</div>