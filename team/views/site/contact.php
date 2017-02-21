<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \team\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'ติดต่อเรา';
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
			var initLatitude = 13.79782348;
			var initLongitude = 102.13758051;

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
				zoom: 17
			};

			var map = $('#googlemaps').gMap(mapSettings);
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
			// Map Center At
			var mapCenterAt = function(options, e) {
    e.preventDefault();
    $('#googlemaps').gMap('centerAt', options);
}

", yii\web\View::POS_END, 'blueimp');
?>

<div role="main" class="main">



    <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
    <div id="googlemaps" class="google-map"></div>

    <div class="container">

        <div class="row">
            <div class="col-md-6">

                <div class="alert alert-success hidden" id="contactSuccess">
                    <strong>Success!</strong> Your message has been sent to us.
                </div>

                <div class="alert alert-danger hidden" id="contactError">
                    <strong>Error!</strong> There was an error sending your message.
                </div>

                <h2 class="mb-sm mt-sm"><?=$this->title?></h2>
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-6">


                <h4 class="heading-primary">สำนักงาน</h4>
                <ul class="list list-icons list-icons-style-3 mt-xlg">
                    <li><i class="fa fa-map-marker"></i> <strong>ที่อยู่:</strong> 609 ม.2 ต.ท่าเกษม อ.เมืองสระแก้ว จ.สระแก้ว 27000</li>
                    <li><i class="fa fa-phone"></i> <strong>โทร:</strong> 037 425 141-4 <strong>โทรสาร:</strong> ต่อ 100</li>
                    <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:support@sko.moph.go.th">support@sko.moph.go.th</a></li>
                </ul>

                <hr>

                <h4 class="heading-primary">วัน<strong>ทำการ</strong></h4>
                <ul class="list list-icons list-dark mt-xlg">
                    <li><i class="fa fa-clock-o"></i> จันทร์ - ศุกร์ 8:30 ถึง 16:30</li>

                </ul>

            </div>

        </div>

    </div>

</div>