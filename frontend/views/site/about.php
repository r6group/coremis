<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['body'] = ' data-spy="scroll" data-target="#sidebar" data-offset="120"';
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
        <div class="col-md-3">
            <aside class="sidebar" id="sidebar" data-plugin-sticky
                   data-plugin-options='{"minWidth": 991, "containerSelector": ".container", "padding": {"top": 110}}'>

                <h4 class="heading-primary">Categories</h4>
                <ul class="nav nav-list mb-xl show-bg-active">
                    <li class="active"><a data-hash data-hash-offset="85" href="#about">เกี่ยวกับหน่วยงาน</a></li>
                    <li><a data-hash data-hash-offset="85" href="#history">ประวัติความเป็นมา</a></li>
                    <li><a data-hash data-hash-offset="85" href="#vision">วิสียทัศน์ พันธกิจ</a></li>
                    <li><a data-hash data-hash-offset="85" href="#board">โครงสร้างหน่วยงาน</a></li>


                    <li><a data-hash data-hash-offset="85" href="#mission">ภารกิจและหน้าที่รับผิดชอบ</a></li>
                </ul>

            </aside>
        </div>
        <div class="col-md-9">


            <div class="row">
                <div class="col-md-6">
                    <h3 class="heading-primary" id="about"><strong>เกี่ยวกับ</strong>หน่วยงาน</h3>

                    <p>สำนักงานสาธารณสุขจังหวัดสระแก้ว ก่อตั้งขึ้นเมื่อปี พ.ศ.2536
                        ภายหลังจากที่ได้มีการก่อตั้งจังหวัดสระแก้วในปีเดียวกัน โดยแยกตัวออกมาจากจังหวัดปราจีนบุรี ดูแลรับผิดชอบประชากรในจังหวัด 540,000 คน การปกครองแบ่งออกเป็น 9 อำเภอ 58 ตำบล 731 หมู่บ้าน

                    <ol>
                        <li>อำเภอเมืองสระแก้ว</li>
                        <li>อำเภอคลองหาด</li>
                        <li>อำเภอตาพระยา</li>
                        <li>อำเภอวังน้ำเย็น</li>
                        <li>อำเภอวัฒนานคร</li>
                        <li>อำเภออรัญประเทศ</li>
                        <li>อำเภอเขาฉกรรจ์</li>
                        <li>อำเภอโคกสูง</li>
                        <li>อำเภอวังสมบูรณ์</li>
                    </ol>

                    <div class="img-thumbnail"><img src="<?php echo $this->theme->baseUrl ?>/img/srakiao.jpg"
                                                    class="img-responsive" alt=""></div>


                        จังหวัดสระแก้วเป็นจังหวัดชายแดนด้านตะวันออกตอนบนของประเทศ ตั้งอยู่ระหว่างเส้นรุ้งที่ 13 องศา 15
                        ลิปดา ถึง 14 องศา 15 ลิปดาเหนือ กับประมาณเส้นแวงที่ 101 องศา 45 ลิปดา ถึง 103 องศาตะวันออก
                        โดยมีอาณาเขตติดต่อกับจังหวัดใกล้เคียงดังนี้
                    <ul>
                        <li>ทิศเหนือ ติดกับจังหวัดบุรีรัมย์และจังหวัดนครราชสีมา</li>
                        <li>ทิศตะวันออก ติดกับประเทศกัมพูชา</li>
                        <li>ทิศใต้ ติดกับจังหวัดจันทบุรี</li>
                        <li>ทิศตะวันตก ติดกับจังหวัดปราจีนบุรี และจังหวัดฉะเชิงเทรา</li>
                    </ul>
                    </p>

                    <p>

                    <h4>สภาพภูมิประเทศ</h4>

                    สภาพทั่วไป พื้นที่จังหวัดสระแก้วโดยรวมเป็นพื้นที่ราบถึงที่ราบสูงและมีภูเขาสูงสลับซับซ้อน
                    มีระดับความสูงจากน้ำทะเล 74 เมตร กล่าวคือ

                    ด้านเหนือ มีทิวเขาบรรทัดซึ่งเป็นต้นกำเนิดของแม่น้ำบางปะกง มีลักษณะเป็นป่าเขาทึบได้แก่
                    บริเวณอุทยานแห่งชาติปางสีดาเป็นแหล่งต้นน้ำลำธาร

                    ด้านใต้ มีลักษณะเป็นที่ราบเชิงเขา มีสภาพเป็นป่าโปร่ง ส่วนใหญ่ถูกบุกรุกแผ้วถางป่าเพื่อทำการเกษตร
                    ทำให้เกิดสภาพป่าเสื่อมโทรม ตอนกลางมีลักษณะเป็นที่ราบ ได้แก่ อำเภอวังน้ำเย็น อำเภอวังสมบูรณ์
                    เป็นเขตติดต่อจังหวัดจันทบุรี

                    ด้านตะวันออก ลักษณะเป็นที่ราบถึงที่ราบสูง และมีสภาพเป็นป่าโปร่ง ทำไร่ ทำนา

                    ด้านตะวันตก นับตั้งแต่อำเภอวัฒนานคร
                    มีลักษณะเป็นสันปันน้ำและพื้นที่ลาดไปทางอำเภอเมืองสระแก้วและอำเภออรัญประเทศ เข้าเขตราชอาณาจักรกัมพูชา
                    </p>

                    <p>

                    <h4>สภาพภูมิอากาศ</h4>

                    สภาพภูมิอากาศแบ่งออกได้เป็น 3 ฤดูกาล

                    ฤดูร้อน เริ่มต้นแต่เดือนกุมภาพันธ์-เดือนเมษายน
                    ฤดูฝน ตั้งแต่เดือนพฤษภาคม-เดือนตุลาคม ปริมาณน้ำฝนเฉลี่ย 1,296-1,539 มิลลิเมตร
                    ฤดูหนาว ตั้งแต่เดือนพฤศจิกายน-เดือนมกราคม อากาศเย็นและมีหมอกในตอนเช้า
                    อุณหภูมิโดยเฉลี่ย 27.5-28.78 องศา
                    </p>

                    <p>

                    <h4>สถานบริการสุขภาพ</h4>

                    สถานบริการสุขภาพจังหวัดสระแก้ว ประกอบไปด้วย
<br>
                    <ul>
                        <li>สำนักงานสาธารณสุขจังหวัด 1 แห่ง</li>
                        <li>สำนักงานสาธารณสุขอำเภอ 9 แห่ง</li>
                        <li><a href="http://203.157.145.19/report/index/?id=47" target="_blank" data-plugin-tooltip="" data-toggle="tooltip" data-placement="top" title="" data-original-title="ดูข้อมูลเพิ่มเติม">โรงพยาบาลส่งเสริมสุขภาพตำบล 107 แห่ง <i class="fa fa-external-link"></i></a> </li>
                        <li><a href="http://203.157.145.19/report/index/?id=47" target="_blank" data-plugin-tooltip="" data-toggle="tooltip" data-placement="top" title="" data-original-title="ดูข้อมูลเพิ่มเติม">สถานีอนามัย(ถ่ายโอน) 3 แห่ง <i class="fa fa-external-link"></i></a> </li>
                        <li>สถานีกาชาด 1 แห่ง สถานีกาชาดที่ 6 อรัญประเทศ จังหวัดสระแก้ว</li>
                    </ul>

                    <strong>โรงพยาบาลรัฐบาล 10 แห่ง (โรงพยาบาลสังกัดกระทรวงกลาโหม 1 แห่ง)</strong>
                    <ul>
                        <li>โรงพยาบาลสมเด็จพระยุพราชสระแก้ว (โรงพยาบาลสมเด็จพระยุพราชแห่งแรก)</li>
                        <li>โรงพยาบาลคลองหาด</li>
                        <li>โรงพยาบาลตาพระยา</li>
                        <li>โรงพยาบาลวังน้ำเย็น</li>
                        <li>โรงพยาบาลวัฒนานคร</li>
                        <li>โรงพยาบาลจิตเวชสระแก้วราชนครินทร์ อำเภอวัฒนานคร</li>
                        <li>โรงพยาบาลอรัญประเทศ</li>
                        <li>โรงพยาบาลเขาฉกรรจ์</li>
                        <li>โรงพยาบาลวังสมบูรณ์</li>
                        <li>โรงพยาบาลโคกสูง</li>
                    </ul>
                    <strong>โรงพยาบาลสังกัดกระทรวงกลาโหม 1 แห่ง</strong>
                    <ul>

                        <li>โรงพยาบาลค่ายสุรสิงหนาท อำเภออรัญประเทศ</li>
                    </ul>
                    <strong>กลุ่มโรงพยาบาลจุฬารัตน์ (เอกชน) 1 แห่ง</strong>
                    <ul>
                        <li>คลินิคเวชกรรมจุฬารัตน์โรงเกลือ อำเภออรัญประเทศ</li>

                    </ul>




                    </p>
                </div>
                <div class="col-md-6">

                    <div id="googlemaps" class="google-map small"></div>
                    <hr>

                    <div class="featured-box-primary">
                        <div class="box-content">
                            <h4 class="text-uppercase">ทำเนียบผู้บริหาร</h4>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        ชื่อ-สกุล
                                    </th>
                                    <th>
                                        ดำรงค์ตำแหน่ง
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        นพ.บัวเรศ ศรีประทักษ์
                                    </td>
                                    <td>
                                        ธ.ค.36 - พ.ย.39
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        นพ.บัณฑิต จึงสมาน
                                    </td>
                                    <td>
                                        พ.ย.39 - พ.ย.42
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        นพ.สำราญ อาบสุวรรณ
                                    </td>
                                    <td>
                                        พ.ย.42 - ม.ค.45
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        นพ.สุวัช เซียศิริวัฒนา
                                    </td>
                                    <td>
                                        ม.ค.45 - ธ.ค.47
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        5
                                    </td>
                                    <td>
                                        นพ.บุญนำ ชัยวิสุทธิ์
                                    </td>
                                    <td>
                                        ม.ค.48 - เม.ย.49
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        6
                                    </td>
                                    <td>
                                        นพ.ธวัชชัย วานิชกร
                                    </td>
                                    <td>
                                        มิ.ย.49 - มิ.ย.49
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        7
                                    </td>
                                    <td>
                                        นพ.ณัฐพร วงษ์ศุทธิภากร
                                    </td>
                                    <td>
                                        ก.ค.49 - พ.ค.50
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        8
                                    </td>
                                    <td>
                                        นพ.พีระ อารีรัตน์
                                    </td>
                                    <td>
                                        มิ.ย.50 - ม.ค.54
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        9
                                    </td>
                                    <td>
                                        นพ.อัษฏางค์ รวยอาจิณ
                                    </td>
                                    <td>
                                        ม.ค.54 - ธ.ค.55
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        นพ.สมยศ ศรีจารนัย
                                    </td>
                                    <td>
                                        ธ.ค.55 - มิ.ย.57
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        11
                                    </td>
                                    <td>
                                        นพ.โกเมนทร์ ทิวทอง
                                    </td>
                                    <td>
                                        ต.ค.57 - พ.ย.58
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        12
                                    </td>
                                    <td>
                                        นพ.อภิรักษ์ พิศุทธ์อาภรณ์
                                    </td>
                                    <td>
                                        พ.ย.58
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <hr class="tall">
                </div>
            </div>

            <h2 class="mb-sm" id="vision">วิสัยทัศน์ พันธกิจ</h2>

            <p>ชาวสระแก้วสุขภาพดี ด้วยวิถีพอเพียง</p>


            <div class="row">
                <div class="col-md-12">
                    <hr class="tall">
                </div>
            </div>

            <h2 class="mb-sm" id="board">ผู้บริหาร</h2>

            <ul class="nav nav-pills sort-source" data-sort-id="team" data-option-key="filter">
                <li data-option-value="*" class="active"><a href="javascript:void(0)">แสดงทั้งหมด</a></li>
                <li data-option-value=".ceo"><a href="javascript:void(0)">นพ.สสจ.</a></li>
                <li data-option-value=".leadership"><a href="javascript:void(0)">รอง นพ.สสจ.</a></li>
                <li data-option-value=".manager"><a href="javascript:void(0)">หัวหน้ากลุ่มงาน</a></li>

            </ul>

            <hr>

            <div class="row">

                <ul class="team-list sort-destination" data-sort-id="team">
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item ceo">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-1.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">นพ.อภิรักษ์ พิศุทธ์อาภรณ์</span>
												<span class="thumb-info-type"> นายแพทย์สาธารณสุขจังหวัดสระแก้ว</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item leadership">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-2.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">พญ.อรรัตน์ จันทร์เพ็ญ</span>
												<span class="thumb-info-type">นายแพทย์ด้านเวชกรรมป้องกัน</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item leadership">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-3.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">ยุภาพรรณ วรรณชัยวงศ์</span>
												<span class="thumb-info-type">นักวิชาการสาธารณสุข เชี่ยวชาญ</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item leadership">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-4.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">ญาณี นาคพงษ์</span>
												<span class="thumb-info-type">นักวิชาการสาธาณสุข ชำนาญการพิเศษ</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item leadership">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-5.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">ไพรัชต์วิริต วิริยะภัคพงศ์</span>
												<span class="thumb-info-type">นักวิชาการสาธาณสุข ชำนาญการพิเศษ</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-6.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">จามจุรี สมบัติวงษ์</span>
												<span class="thumb-info-type">หัวหน้ากลุ่มงานบริหารทั่วไป</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-7.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">ดารารัตน์ โห้วงศ์</span>
												<span
                                                    class="thumb-info-type">หัวหน้ากลุ่มงานพัฒนายุทธศาสตร์สาธารณสุข</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-8.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">สมเกียรติ ทองเล็ก</span>
												<span class="thumb-info-type">หัวหน้ากลุ่มงานควบคุมโรค</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-9.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">อรพิน ภัทรกรสกุล</span>
												<span class="thumb-info-type">หัวหน้ากลุ่มงานการเจ้าหน้าที่</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-10.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">มานัชย์ เวชบุญ</span>
												<span
                                                    class="thumb-info-type">หัวหน้ากลุ่มงานพัฒนาคุณภาพและระบบบริการ</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-11.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">ลอองจันทร์ คำภิรานนท์</span>
												<span class="thumb-info-type">หัวหน้ากลุ่มงานส่งเสริมสุขภาพ</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-12.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">สานิษ ศิริปิ่น</span>
												<span class="thumb-info-type">หัวหน้ากลุ่มงานคุ้มครองผู้บริโภคและเภสัชสาธารณสุข</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-13.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">จามจุรี สมบัติวงษ์</span>
												<span class="thumb-info-type">หัวหน้ากลุ่มงานประกันสุขภาพ</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-14.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">รัฐพงศ์ เทพอยู่</span>
												<span class="thumb-info-type">หัวหน้ากลุ่มงานทันตสาธารณสุข</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-12 isotope-item manager">
								<span class="thumb-info thumb-info-hide-wrapper-bg mb-xlg">
									<span class="thumb-info-wrapper">

                                            <img src="<?php echo $this->theme->baseUrl ?>/img/team/team-15.jpg"
                                                 class="img-responsive" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">ปราโมทย์ บุญเปล่ง</span>
												<span class="thumb-info-type">หัวหน้ากลุ่มงานนิติการ</span>
											</span>

									</span>
									<span class="thumb-info-caption">

										<span class="thumb-info-social-icons">
											<a target="_blank" href="http://www.facebook.com"><i
                                                    class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="http://www.twitter.com"><i
                                                    class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
										</span>
									</span>
								</span>
                    </li>
                </ul>

            </div>


            <div class="row">
                <div class="col-md-12">
                    <hr class="tall">
                </div>
            </div>

            <h2 class="mb-sm" id="mission">ภารกิจ และหน้าที่รับผิดชอบ</h2>
            <h4>อำนาจหน้าที่</h4>
            <ol class="list list-ordened list-ordened-style-2">
                <li>จัดทำแผนยุทธศาสตร์ด้านสุขภาพในเขตพื้นที่จังหวัด</li>
                <li>ดำเนินการและประสานงานเกี่ยวกับงานสาธารณสุขในเขตพื้นที่จังหวัด</li>
                <li>กำกับ ดูแล ประเมินผลและสนับสนุนการปฏิบัติงานของหน่วยงานสาธารณสุขในเขตพื้นที่จังหวัด
                    เพื่อให้การปฏิบัติงานเป็นไปตามกฎหมาย มีการบริการสุขภาพที่มีคุณภาพ
                    และมีการคุ้มครองผู้บริโภคด้านสุขภาพ
                </li>
                <li>ปฏิบัติงานร่วมกับหรือสนับสนุนการปฏิบัติงานของหน่วยงานอื่นที่เกี่ยวข้อง หรือที่ได้รับมอบหมาย</li>
            </ol>


            <div class="row">
                <div class="col-md-12">
                    <hr class="tall">
                </div>
            </div>
        </div>

    </div>

</div>






