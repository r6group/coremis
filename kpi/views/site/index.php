<?php

/* @var $this yii\web\View */

use yii\helpers\Html;



$this->title = 'ผู้บริหาร';
$this->params['sidemenu'][] = false;
?>


<style>
    .info {
        padding: 6px 8px;
        background: white;
        background: rgba(255,255,255,0.8);
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
        border-radius: 5px;
    }
    .info h4 {
        margin: 0 0 5px;
        color: #777;
    }
    .legend {
        line-height: 18px;
        color: #555;
    }
    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin-right: 8px;
        opacity: 0.7;
    }

</style>


<link rel="stylesheet" href="http://203.157.145.19/leaflet/leaflet.css" />
<script src="http://203.157.145.17/hdc/main/includes/geojson_ext.php?a=06&t=1&r=442f204be9d6aec9da15786ad707d5a4&year=2016"></script>
<script src="http://203.157.145.19/leaflet/leaflet.js"></script>



<div class="container">

    <h2>Meet the <strong>Team</strong></h2>


    <ul class="nav nav-pills sort-source" data-sort-id="team" data-option-key="filter">
        <li data-option-value="*" class="active"><a href="#">All</a></li>
        <li data-option-value=".PA"><a href="#">PA</a></li>
        <li data-option-value=".สตป"><a href="#">สตป.</a></li>
        <li data-option-value=".PnP"><a href="#">P&P</a></li>
        <li data-option-value=".Service"><a href="#">Service</a></li>
        <li data-option-value=".People"><a href="#">People</a></li>
        <li data-option-value=".Governance"><a href="#">Governance</a></li>

    </ul>

    <hr>

    <div class="row">

        <ul class="team-list sort-destination" data-sort-id="team" style="padding-left: 0px">
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละของเด็กอายุ 0-5 ปี สูงดีสมส่วน และส่วนสูงเฉลี่ยที่อายุ 5 ปี</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="col-md-3 col-sm-6 col-xs-12 isotope-item ceo">
                <div class="widget">
                    <div class="widget-header" style="overflow: hidden">
                        <h6><i class="fa fa-user"></i> ร้อยละสถานบริการสุขภาพที่มีการคลอดมาตรฐาน</h6>

                    </div>
                    <div class="widget-content text-center">
                        <div class="number-chart">
                            <div class="number pull-left"><span>67.9</span> </div>
                            <div class="mini-stat">
                                <div id="number-chart1" class="inlinesparkline">
                                    <canvas width="180" height="30"
                                            style="display: inline-block; vertical-align: top; width: 180px; height: 30px;"></canvas>
                                </div>
                                <p class="text-muted"><i class="fa fa-caret-up green-font"></i> 19% higher than
                                    last
                                    week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

    </div>

</div>