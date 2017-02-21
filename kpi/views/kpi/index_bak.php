<?php
/* @var $this yii\web\View */
use kartik\grid\GridView;
use kpi\models\KpiSum;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\web\View;
use common\models\Profile;

$this->registerJsFile('@web/themes/kingadmin/js/plugins/bootstrap-progressbar/bootstrap-progressbar.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->title =  $kpi_model->title . ' '.$postfix_title;
//$kpi_model[0]['title'] .
$panel_title = $title == 1 ? '' : $this->title;
?>

    <style>
        .hover_group:hover {
            opacity: 0.5;
            -webkit-transition: opacity 0.4s ease-in;
        }


    </style>



<?php


if ($embeded != '1' || ($embeded == '1' && $title == '1')) {
?>
<div class="widget">
    <div class="widget-content">
    <div class="pull-right">
        <div class="label label-primary">ตัวชี้วัดระดับ<?= $kpi[0]['kpi_level'] ?></div>
    </div>
    <div>
        <h3><i class="fa fa-bar-chart-o fw"></i> ตัวชี้วัดที่ <?= $kpi[0]['kpi_no'] ?>: <?= $this->title?></h3>
    </div>
    </div>
</div>
<?php
}
?>




<?php

    $year = $kpi[0]['kpi_year'];
    $today = date('Y-m-d', strtotime(date('Y-m-d')));
    $quater = 4;

    if (($today >= date('Y-m-d', strtotime(($year -544)."-10-01"))) && ($today <= date('Y-m-d', strtotime(($year -544)."-12-31")))) {
        $quater = 1;
    } elseif (($today >= date('Y-m-d', strtotime(($year -543)."-01-01"))) && ($today <= date('Y-m-d', strtotime(($year -543)."-03-31")))) {
        $quater = 2;
    } elseif (($today >= date('Y-m-d', strtotime(($year -543)."-04-01"))) && ($today <= date('Y-m-d', strtotime(($year -543)."-06-30")))) {
        $quater = 3;
    } elseif (($today >= date('Y-m-d', strtotime(($year -543)."-07-01"))) && ($today <= date('Y-m-d', strtotime(($year -543)."-09-30")))) {
        $quater = 4;
    }


    $goal = 100;
    $goal_q1 = $kpi[0]['q1_goal'];
    $goal_q2 = $kpi[0]['q2_goal'];
    $goal_q3 = $kpi[0]['q3_goal'];
    $goal_q4 = $kpi[0]['q4_goal'];

    switch ($quater) {
        case 1:
            $goal = $kpi[0]['q1_goal'] != "" ? $kpi[0]['q1_goal'] : ($kpi[0]['q2_goal'] != "" ? $kpi[0]['q2_goal'] : ($kpi[0]['q3_goal'] != "" ? $kpi[0]['q3_goal'] : ($kpi[0]['q4_goal'] != "" ? $kpi[0]['q4_goal'] : (0))));
            break;
        case 2:
            $goal = $kpi[0]['q2_goal'] != "" ? $kpi[0]['q2_goal'] : ($kpi[0]['q3_goal'] != "" ? $kpi[0]['q3_goal'] : ($kpi[0]['q4_goal'] != "" ? $kpi[0]['q4_goal'] : (0)));
            break;
        case 3:
            $goal = $kpi[0]['q3_goal'] != "" ? $kpi[0]['q3_goal'] : ($kpi[0]['q4_goal'] != "" ? $kpi[0]['q4_goal'] : (0));
            break;
        case 4:
            $goal = $kpi[0]['q4_goal'] != "" ? $kpi[0]['q4_goal'] : (0);
            break;
    }


    //MAP

    $map_color = array();

    $color_list = [];

    $operator = $kpi[0]['operator'];
    $color_success = "#A7D21F";
    $color_fail = "#d10303";





    foreach ($dataProvider->models as $r) {

        $percent = $r['kpi_result'];



        if ($operator == "=") {
            if ($percent == $goal) {
                $map_color[$r['provid']] = $color_success;
            } else {
                $map_color[$r['provid']] = $color_fail;
            }
        } elseif ($operator == ">=") {
            if ($percent >= $goal) {
                $map_color[$r['provid']] = $color_success;
            } else {
                $map_color[$r['provid']] = $color_fail;
            }
        } elseif ($operator == "<=") {
            if ($percent <= $goal) {
                $map_color[$r['provid']] = $color_success;
            } else {
                $map_color[$r['provid']] = $color_fail;
            }
        } elseif ($operator == ">") {
            if ($percent > $goal) {
                $map_color[$r['provid']] = $color_success;
            } else {
                $map_color[$r['provid']] = $color_fail;
            }
        } elseif ($operator == "<") {
            if ($percent < $goal) {
                $map_color[$r['provid']] = $color_success;
            } else {
                $map_color[$r['provid']] = $color_fail;
            }
        } else {
            $map_color[$r['provid']] = $color_fail;
        }

        //$map_color[$r['provid']] = "#d10303";
        $color_list[].= $map_color[$r['provid']];
    }



    ?>




<?php
if ($embeded != '1' || ($embeded == '1' && ($gauge == '1' || $gis == '1'))) {
?>
<div class="row">



<?php
if ($embeded != '1' || ($embeded == '1' && $gauge == '1')) {
?>
<div class="col-md-<?=$gis == 1 ? '5  cockpit': '12' ?>">
<div class="widget">
    <div class="widget-header">
        <h3><i class="fa fa-dashboard"></i> KPI</h3> <em> - <?= $panel_title ?></em>



    </div>





    <div class="widget-content" style="min-height: 430px;">

                <div>

                    <div>

                        <?php

                        //echo '<br>'.print_r($provname);
                        //echo '<br>'.'<br>'.print_r($nine_m_PER);
                        //echo '<br>'.print_r($mPER9);
                        //echo '<br>'.print_r($per_asphyxia);


                        $percent = $kpi[0]['page_result'];
                        $max_value = $kpi[0]['max_value'];

                        if ($max_value <= 0) {
                            $max_value = 100;
                        }

                        if ($percent > $max_value) {
                            $max_value = $percent;
                        }

                        $result_postfig = '';
                        if ($kpi[0]['kpi_unit'] == 'ระดับความสำเร็จ' || $kpi[0]['kpi_unit'] == 'ขั้นตอน') {
                            $percent = $kpi[0]['avg_a'];
                            $max_value = $kpi[0]['max_value'] + 2;

                            $result_postfig = '/' . $kpi[0]['max_value'];
                        }


                        $operator = $kpi[0]['operator'];
                        $left_color = "#d10303";
                        $right_color = "#A7D21F";
                        $result_success = '<i class="fa fa-check-circle green-font"></i>';
                        $result_fail = '<i class="fa fa-close red-font"></i>';

                        if ($operator == "=") {
                            if ($percent == $goal) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == ">=") {
                            if ($percent >= $goal) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == "<=") {
                            if ($percent <= $goal) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == ">") {
                            if ($percent > $goal) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == "<") {
                            if ($percent < $goal) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } else {
                            $result_sign = $result_fail;
                        }


                        if ($operator == "<=" || $operator == "<") {
                            $left_color = "#A7D21F";
                            $right_color = "#d10303";
                        }

                        echo Highcharts::widget([
                            'scripts' => [
                                'highcharts-more',
                                //'modules/exporting',
                                //'themes/grid-light',
                            ],

                            'options' => [
                                'chart' => [
                                    'type' => 'solidgauge',
                                    'height' => '180',
                                    //'width'=>'180',
                                    'backgroundColor' => 'rgba(255, 255, 255, 0.1)',
                                ],

                                'title' => null,


                                'pane' => [
                                    'center' => ['50%', '85%'],
                                    'size' => '140%',
                                    'startAngle' => -100,
                                    'endAngle' => 100,
                                    'background' => [
                                        'backgroundColor' => '#FFF',
                                        'innerRadius' => '60%',
                                        'outerRadius' => '90%',
                                        'shape' => 'arc'
                                    ]
                                ],

                                'tooltip' => [
                                    'enabled' => false
                                ],

                                // the value axis
                                'yAxis' => [
                                    'lineWidth' => 0,
                                    'minorTickInterval' => null,
                                    'tickPixelInterval' => 20,
                                    'tickWidth' => 1,
                                    'tickLength' => 20,
                                    'title' => [
                                        'y' => -70,
                                        'text' => 'Overall result'
                                    ],
                                    'labels' => [
                                        'y' => 1,
                                        'step' => 5,
                                        'rotation' => 'auto'
                                    ],
                                    'min' => 0,
                                    'max' => $max_value,

                                    'plotBands' => [[
                                        'from' => 0,
                                        'to' => $goal,
                                        'color' => $left_color
                                    ], [
                                        'from' => $goal,
                                        'to' => $max_value,
                                        'color' => $right_color
                                    ]]
                                ],
                                'credits' => [
                                    'enabled' => false
                                ],

                                'plotOptions' => [
                                    'solidgauge' => [
                                        'dataLabels' => [
                                            'y' => 50,
                                            'borderWidth' => 0,
                                            'useHTML' => true
                                        ]
                                    ]
                                ],


                                'series' => [[
                                    'name' => 'Speed',
                                    'data' => [floatval(number_format((float)$percent, 2, '.', ''))],
                                    'type' => 'gauge',

                                    'dataLabels' => [
                                        'y' => 32,
                                        //'format'=> '<div style="text-align:center"><span style="font-size:18px;color:#555;padding-top: 10px">{y}</span></div>'
                                    ],
//                'tooltip' => [
//                    'valueSuffix' => ' km/h'
//                ]
                                ]],

                            ]]);

                        ?>

                    </div>
                    <div>

                        <div style="margin-left: 10%;margin-right: 10%;min-width: 200px">
                            <div class="contextual-summary-info-big">

                                <?= $result_sign ?>
                                <p class="pull-right">
                                    <span><?= $kpi[0]['kpi_unit'] ?></span> <?= floatval(number_format((float)$percent, 2, '.', '')) . $result_postfig ?>
                                </p>
                            </div>

                        </div>
                    </div>

                        <!-- BORDERED TABLE -->
                    <?php




                    $kpi_year = is_null($kpi[0]['kpi_year']) ? (date('m', strtotime(date('Y-m-d'))) >= 10 ? date('Y', strtotime(date('Y-m-d'))) + 544 : date('Y', strtotime(date('Y-m-d')))) : $kpi[0]['kpi_year'];


                    $date1 = new DateTime(($kpi_year - 544)."-10-01");
                    $today = new DateTime(date('Y-m-d', strtotime(date('Y-m-d'))));


                    $diff = $today->diff($date1)->format("%a");
                    $diff = ($diff*100) / 365;
                    if ($diff > 100) {$diff = 100;}





                        $q_count = 0;

                        if ($kpi[0]['q1_goal'] <> "") {
                            $q_count++;
                        }
                        if ($kpi[0]['q2_goal'] <> "") {
                            $q_count++;
                        }
                        if ($kpi[0]['q3_goal'] <> "") {
                            $q_count++;
                        }
                        if ($kpi[0]['q4_goal'] <> "") {
                            $q_count++;
                        }

                    if ($q_count > 0) {
                        $q_count = 100/$q_count;
                    }


                    ?>

                            <h4><i class="fa fa-flag"></i> ค่าเป้าหมาย</h4>
                    <div class="progress demo-only progress-xs" style="margin-bottom: 0px;">
                        <div class="progress-bar" data-transitiongoal="<?=$diff?>" style="width: <?=$diff?>%;" aria-valuenow="<?=$diff?>"><?=$diff?>%</div>
                    </div>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <?=($kpi[0]['q1_goal'] <> "") ? '<th width="'.$q_count.'%">ไตรมาส 1</th>': '';?>
                                    <?=($kpi[0]['q2_goal'] <> "") ? '<th width="'.$q_count.'%">ไตรมาส 2</th>': "";?>
                                    <?=($kpi[0]['q3_goal'] <> "") ? '<th width="'.$q_count.'%">ไตรมาส 3</th>': "";?>
                                    <?=($kpi[0]['q4_goal'] <> "") ? '<th width="'.$q_count.'%">ไตรมาส 4</th>': "";?>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?=($kpi[0]['q1_goal'] <> "") ? '<td class="goal"> '.$kpi[0]['operator'].' '.$kpi[0]['q1_goal'].' </td>': ""?>
                                    <?=($kpi[0]['q2_goal'] <> "") ? '<td class="goal">'.$kpi[0]['operator'].' '.$kpi[0]['q2_goal'].'</td>': ""?>
                                    <?=($kpi[0]['q3_goal'] <> "") ? '<td class="goal">'.$kpi[0]['operator'].' '.$kpi[0]['q3_goal'].'</td>': ""?>
                                    <?=($kpi[0]['q4_goal'] <> "") ? '<td class="goal">'.$kpi[0]['operator'].' '.$kpi[0]['q4_goal'].'</td>': ""?>
                                </tr>
                                </tbody>
                            </table>

                        <!-- END BORDERED TABLE -->



        </div>
    </div>
</div>
</div>

<?php
 }
?>


<?php
if ($embeded != '1' || ($embeded == '1' && $gis == '1')) {
?>
<div class="col-md-<?=$gauge == 1 ? '7': '12' ?>">
    <div class="widget">
    <div class="widget-header">
        <h3><i class="fa fa-globe"></i> GIS</h3> <em> - <?= $panel_title ?></em>

    </div>
    <div class="widget-content">
        <div style="width:100%; height:400px" id="map"></div>
        </div>
        </div>
</div>
<?php
 }
?>

    </div>
<?php
}
?>






<?php
if ($embeded != '1' || ($embeded == '1' && $chart == '1')) {
?>

<div class="widget">
    <div class="widget-header">
        <h3><i class="fa fa-windows"></i> Chart</h3> <em> - <?= $panel_title ?></em>


        <div class="widget-header-toolbar">
            <div class="control-inline toolbar-item-group">
                <span class="control-title"><i class="fa fa-star"></i>Pin to dashboard</span>

                <div class="control-inline onoffswitch">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch" checked="">
                    <label class="onoffswitch-label" for="switch">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-content">
        <?php



        echo Highcharts::widget([


            'scripts' => [
                'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
                //'modules/exporting', // adds Exporting button/menu to chart
                //'themes/grid'        // applies global 'grid' theme to all charts
            ],


            'options' => [
                'title' => ['text' => $kpi[0]['title']],
                'xAxis' => [
                    'categories' => $provname,
                    'crosshair' => true,

                ],
                'yAxis' => [
                    'title' => ['text' => $kpi[0]['kpi_unit']],
                    'max' => 100,
                    'plotLines' => [
                        [
                        'value' => $kpi[0]['q1_goal'],
                            'color' => $quater == 1 ? '#ff0000' : '#ccc',

                        'width' => 2,
                        'zIndex' => 4,
                        'label' => ['text' => 'Q1 goal: ' . $kpi[0]['operator'] . $kpi[0]['q1_goal']]
                    ],
                        [
                            'value' => $kpi[0]['q2_goal'],
                            'color' => $quater == 2 ? '#ff0000' : '#ccc',

                            'width' => 2,
                            'zIndex' => 4,
                            'label' => ['text' => 'Q2 goal: ' . $kpi[0]['operator'] . $kpi[0]['q2_goal']]
                        ],
                        [
                            'value' => $kpi[0]['q3_goal'],
                            'color' => $quater == 3 ? '#ff0000' : '#ccc',

                            'width' => 2,
                            'zIndex' => 4,
                            'label' => ['text' => 'Q3 goal: ' . $kpi[0]['operator'] . $kpi[0]['q3_goal']]
                        ],
                        [
                            'value' => $kpi[0]['q4_goal'],
                            'color' => $quater == 4 ? '#ff0000' : '#ccc',

                            'width' => 2,
                            'zIndex' => 4,
                            'label' => ['text' => 'Q4 goal: ' . $kpi[0]['operator'] . $kpi[0]['q4_goal']]
                        ]

                    ]

                ],
                'chart' => ['type' => 'column'],

                'tooltip' => ['shared' => true],

                'plotOptions' => ['column' => ['colorByPoint' => true]],

                'credits' => [
                    'enabled' => false
                ],

                'colors' => $color_list,
//       'gradient' => ['enabled'=> true],
//       'credits' => ['enabled' => false],
//       /*'exporting' => array('enabled' => false),*/ //to turn off exporting uncomment
                'chart' => [
                    'backgroundColor' => 'rgba(255, 255, 255, 0.1)',
                    'plotBorderWidth' => null,
                    'plotShadow' => false,
                    'height' => 340,

                ],

                'series' => [


                    ['type' => 'column', 'name' => 'ผลดำเนินงาน', 'data' => $kpiresult],


                ]
            ]
        ]);

        ?>
    </div>
</div>
<?php
}
?>


<?php
if ($embeded != '1' || ($embeded == '1' && $table == '1')) {
?>
<div class="widget">
    <div class="widget-header">
        <h3><i class="fa fa-windows"></i> Table</h3> <em> - <?= $panel_title ?></em>



        <div class="btn-group widget-header-toolbar">
            <div class="control-inline toolbar-item-group">
                <a href="<?= Url::toRoute(['kpi-sum/index', 'KpiSumSearch[kpi_id]' => $kpi[0]['id'], 'id' => $kpi[0]['id']]) ?>"
                   class="btn-borderless"><i class="fa fa-edit"></i>รายงานผลการดำเนินงาน</a>


            </div>
        </div>
    </div>
    <div class="widget-content" style="overflow: hidden;">
        <?php

        function time_elapsed_string($datetime, $full = false)
        {
            $now = new DateTime;

            $ago = new DateTime($datetime);

            //$now->setTimezone(new DateTimeZone('Asia/Bangkok'));
            //$ago->setTimezone(new DateTimeZone('Asia/Bangkok'));


            $diff = $now->diff($ago);

            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;

            $string = array(
                'y' => 'ปี',
                'm' => 'เดือน',
                'w' => 'สัปดาห์',
                'd' => 'วัน',
                'h' => 'ชั่วโมง',
                'i' => 'นาที',
                's' => 'วินาที',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
                } else {
                    unset($string[$k]);
                }
            }

            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ที่ผ่านมา' : 'เมื่อสักครู่';
        }

        Global $sum_a;
        Global $sum_b;
        //$sum_b = 10;

        $columns = [
            ['class' => 'kartik\grid\SerialColumn'],
            ['label' => $lv == "0" ? 'เขต' : 'จังหวัด','noWrap' => true, 'attribute' => 'provname'],
//            ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร A" data-content="' . $kpi[0]['a_desc'] . '"><span class="badge element-bg-color-blue">A</span></button>', 'label' => 'A', 'attribute' => 'kpi_a_value', 'noWrap' => true,'class' => '\kartik\grid\DataColumn', 'format' => ['decimal', 2], 'hAlign' => 'right',
//                'pageSummary' => true,
//                'pageSummary' => function ($summary, $data, $widget) {
//                    $GLOBALS['sum_a'] = $summary;
//                    return $summary;
//                },
//            ],

//            ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร B" data-content="' . $kpi[0]['b_desc'] . '"><span class="badge element-bg-color-orange">B</span></button>', 'label' => 'B', 'attribute' => 'kpi_b_value', 'noWrap' => true,'class' => '\kartik\grid\DataColumn', 'format' => ['decimal', 2], 'hAlign' => 'right',
//                'pageSummary' => true,
//                'pageSummary' => function ($summary, $data, $widget) {
//                    $GLOBALS['sum_b'] = $summary;
//                    return $summary;
//                },
//            ],


        ];

        if ($kpi[0]['a_desc'] != "" && $kpi[0]['fixed_a'] == 1) {
            array_push($columns, ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร A" data-placement="bottom" data-content="' . $kpi[0]['a_desc'] . '"><span class="badge element-bg-color-blue">A</span></button>', 'label' => 'A', 'attribute' => 'kpi_a_value', 'class' => '\kartik\grid\DataColumn','noWrap' => true, 'format' => ['decimal', 2], 'hAlign' => 'right', 'pageSummary' => true]);
        }
        if ($kpi[0]['b_desc'] != "" && $kpi[0]['fixed_b'] == 1) {
            array_push($columns, ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร B" data-placement="bottom" data-content="' . $kpi[0]['b_desc'] . '"><span class="badge element-bg-color-orange">B</span></button>', 'label' => 'B', 'attribute' => 'kpi_b_value', 'class' => '\kartik\grid\DataColumn','noWrap' => true, 'format' => ['decimal', 2], 'hAlign' => 'right', 'pageSummary' => true]);
        }
        if ($kpi[0]['c_desc'] != "" && $kpi[0]['fixed_c'] == 1) {
            array_push($columns, ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร C" data-placement="bottom" data-content="' . $kpi[0]['c_desc'] . '"><span class="badge">C</span></button>', 'label' => 'C', 'attribute' => 'kpi_c_value', 'class' => '\kartik\grid\DataColumn','noWrap' => true, 'format' => ['decimal', 2], 'hAlign' => 'right', 'pageSummary' => true]);
        }
        if ($kpi[0]['d_desc'] != "" && $kpi[0]['fixed_d'] == 1) {
            array_push($columns, ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร D" data-placement="bottom" data-content="' . $kpi[0]['d_desc'] . '"><span class="badge">D</span></button>', 'label' => 'D', 'attribute' => 'kpi_d_value', 'class' => '\kartik\grid\DataColumn','noWrap' => true, 'format' => ['decimal', 2], 'hAlign' => 'right', 'pageSummary' => true]);
        }
        if ($kpi[0]['e_desc'] != "" && $kpi[0]['fixed_e'] == 1) {
            array_push($columns, ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร E" data-placement="bottom" data-content="' . $kpi[0]['e_desc'] . '"><span class="badge">E</span></button>', 'label' => 'E', 'attribute' => 'kpi_e_value', 'class' => '\kartik\grid\DataColumn','noWrap' => true, 'format' => ['decimal', 2], 'hAlign' => 'right', 'pageSummary' => true]);
        }
        if ($kpi[0]['f_desc'] != "" && $kpi[0]['fixed_f'] == 1) {
            array_push($columns, ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร F" data-placement="bottom" data-content="' . $kpi[0]['f_desc'] . '"><span class="badge">F</span></button>', 'label' => 'F', 'attribute' => 'kpi_f_value', 'class' => '\kartik\grid\DataColumn','noWrap' => true, 'format' => ['decimal', 2], 'hAlign' => 'right', 'pageSummary' => true]);
        }


        if ($kpi[0]['a_desc'] != "" && $kpi[0]['fixed_a'] != 1) {
            array_push($columns, ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร A" data-placement="bottom" data-content="' . $kpi[0]['a_desc'] . '"><span class="badge element-bg-color-blue">A</span></button>', 'label' => 'A', 'attribute' => 'kpi_a_value', 'class' => '\kartik\grid\DataColumn','noWrap' => true, 'format' => ['decimal', 2], 'hAlign' => 'right', 'pageSummary' => true]);
        }
        if ($kpi[0]['b_desc'] != "" && $kpi[0]['fixed_b'] != 1) {
            array_push($columns, ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร B" data-placement="bottom" data-content="' . $kpi[0]['b_desc'] . '"><span class="badge element-bg-color-orange">B</span></button>', 'label' => 'B', 'attribute' => 'kpi_b_value', 'class' => '\kartik\grid\DataColumn','noWrap' => true, 'format' => ['decimal', 2], 'hAlign' => 'right', 'pageSummary' => true]);
        }
        if ($kpi[0]['c_desc'] != "" && $kpi[0]['fixed_c'] != 1) {
            array_push($columns, ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร C" data-placement="bottom" data-content="' . $kpi[0]['c_desc'] . '"><span class="badge">C</span></button>', 'label' => 'C', 'attribute' => 'kpi_c_value', 'class' => '\kartik\grid\DataColumn','noWrap' => true, 'format' => ['decimal', 2], 'hAlign' => 'right', 'pageSummary' => true]);
        }
        if ($kpi[0]['d_desc'] != "" && $kpi[0]['fixed_d'] != 1) {
            array_push($columns, ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร D" data-placement="bottom" data-content="' . $kpi[0]['d_desc'] . '"><span class="badge">D</span></button>', 'label' => 'D', 'attribute' => 'kpi_d_value', 'class' => '\kartik\grid\DataColumn','noWrap' => true, 'format' => ['decimal', 2], 'hAlign' => 'right', 'pageSummary' => true]);
        }
        if ($kpi[0]['e_desc'] != "" && $kpi[0]['fixed_e'] != 1) {
            array_push($columns, ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร E" data-placement="bottom" data-content="' . $kpi[0]['e_desc'] . '"><span class="badge">E</span></button>', 'label' => 'E', 'attribute' => 'kpi_e_value', 'class' => '\kartik\grid\DataColumn','noWrap' => true, 'format' => ['decimal', 2], 'hAlign' => 'right', 'pageSummary' => true]);
        }
        if ($kpi[0]['f_desc'] != "" && $kpi[0]['fixed_f'] != 1) {
            array_push($columns, ['header' => '<button type="button" class="btn btn-link btn-help" data-original-title="data-original-title" title="ตัวแปร F" data-placement="bottom" data-content="' . $kpi[0]['f_desc'] . '"><span class="badge">F</span></button>', 'label' => 'F', 'attribute' => 'kpi_f_value', 'class' => '\kartik\grid\DataColumn','noWrap' => true, 'format' => ['decimal', 2], 'hAlign' => 'right', 'pageSummary' => true]);
        }



        if ($kpi[0]['q1_goal'] > 0) {
            array_push($columns,
                ['label' => 'Q1 ('.$kpi[0]['operator'].' '.$kpi[0]['q1_goal'].')', 'attribute' => 'kpi_result_q1', 'noWrap' => true,'format' => ['decimal', 2], 'hAlign' => 'right',
                    'format' => 'raw',
                    'value'=>function ($model, $key, $index, $widget) use ($operator, $goal_q1) {

                        $result_success = 'element-bg-color-success';
                        $result_fail = 'element-bg-color-fail';

                        if ($operator == "=") {
                            if ($model['kpi_result_q1'] == $goal_q1) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == ">=") {
                            if ($model['kpi_result_q1'] >= $goal_q1) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == "<=") {
                            if ($model['kpi_result_q1'] <= $goal_q1) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == ">") {
                            if ($model['kpi_result_q1'] > $goal_q1) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == "<") {
                            if ($model['kpi_result_q1'] < $goal_q1) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } else {
                            $result_sign = $result_fail;
                        }
                        return '<span class="badge '.$result_sign.'">'.$model['kpi_result_q1'].'</span>' ;
                    },
                ]
            );
        }

        if ($kpi[0]['q2_goal'] > 0) {
            array_push($columns,
                ['label' => 'Q2 ('.$kpi[0]['operator'].' '.$kpi[0]['q2_goal'].')', 'attribute' => 'kpi_result_q2', 'noWrap' => true,'format' => ['decimal', 2], 'hAlign' => 'right',
                    'format' => 'raw',
                    'value'=>function ($model, $key, $index, $widget) use ($operator, $goal_q2) {

                        $result_success = 'element-bg-color-success';
                        $result_fail = 'element-bg-color-fail';

                        if ($operator == "=") {
                            if ($model['kpi_result_q2'] == $goal_q2) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == ">=") {
                            if ($model['kpi_result_q2'] >= $goal_q2) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == "<=") {
                            if ($model['kpi_result_q2'] <= $goal_q2) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == ">") {
                            if ($model['kpi_result_q2'] > $goal_q2) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == "<") {
                            if ($model['kpi_result_q2'] < $goal_q2) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } else {
                            $result_sign = $result_fail;
                        }
                        return '<span class="badge '.$result_sign.'">'.$model['kpi_result_q2'].'</span>' ;
                    },
                ]
            );
        }

        if ($kpi[0]['q3_goal'] > 0) {
            array_push($columns,
                ['label' => 'Q3 ('.$kpi[0]['operator'].' '.$kpi[0]['q3_goal'].')', 'attribute' => 'kpi_result_q3', 'noWrap' => true,'format' => ['decimal', 2], 'hAlign' => 'right',
                    'format' => 'raw',
                    'value'=>function ($model, $key, $index, $widget) use ($operator, $goal_q3) {

                        $result_success = 'element-bg-color-success';
                        $result_fail = 'element-bg-color-fail';

                        if ($operator == "=") {
                            if ($model['kpi_result_q3'] == $goal_q3) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == ">=") {
                            if ($model['kpi_result_q3'] >= $goal_q3) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == "<=") {
                            if ($model['kpi_result_q3'] <= $goal_q3) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == ">") {
                            if ($model['kpi_result_q3'] > $goal_q3) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == "<") {
                            if ($model['kpi_result_q3'] < $goal_q3) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } else {
                            $result_sign = $result_fail;
                        }
                        return '<span class="badge '.$result_sign.'">'.$model['kpi_result_q3'].'</span>' ;
                    },
                ]
            );
        }

        if ($kpi[0]['q4_goal'] > 0) {
            array_push($columns,
                ['label' => 'Q4 ('.$kpi[0]['operator'].' '.$kpi[0]['q4_goal'].')', 'attribute' => 'kpi_result_q4', 'noWrap' => true, 'format' => ['decimal', 2], 'hAlign' => 'right',
                    'format' => 'raw',
                    'value'=>function ($model, $key, $index, $widget) use ($operator, $goal_q4) {

                        $result_success = 'element-bg-color-success';
                        $result_fail = 'element-bg-color-fail';

                        if ($operator == "=") {
                            if ($model['kpi_result_q4'] == $goal_q4) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == ">=") {
                            if ($model['kpi_result_q4'] >= $goal_q4) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == "<=") {
                            if ($model['kpi_result_q4'] <= $goal_q4) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == ">") {
                            if ($model['kpi_result_q4'] > $goal_q4) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } elseif ($operator == "<") {
                            if ($model['kpi_result_q4'] < $goal_q4) {
                                $result_sign = $result_success;
                            } else {
                                $result_sign = $result_fail;
                            }
                        } else {
                            $result_sign = $result_fail;
                        }
                        return '<span class="badge '.$result_sign.'">'.$model['kpi_result_q4'].'</span>' ;
                    },
                ]

            );
        }


        array_push($columns, ['label' => 'ผลการดำเนินงาน(' . $kpi[0]['kpi_unit'] . ')', 'noWrap' => true,'attribute' => 'kpi_result', 'hAlign' => 'right', 'class' => '\kartik\grid\DataColumn',
            'pageSummary' => function ($summary, $data, $widget) use ($percent) {
                return $percent;
            },
//            'value'=>function ($model, $key, $index, $widget) {
//                $p = compact('model', 'key', 'index');
//                return $model['provname'] ;
//            },
        ]);


        array_push($columns,
            [
                'format'=>'html',
                'label' => 'Files', 'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['attach_files'] && $model['attach_files'] != 'null' ? Html::a( '<i class="fa fa-file-text"></i>', ['kpi-sum/view', 'id'=> $model['id']]) : '';

                }
            ]
        );

        array_push($columns,
            [
                'format'=>'html',
                'label' => 'Quick Win Q1', 'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget)  {
                    return $model['qwin_q1'] && $model['qwin_q1'] != 'null' ? Html::a( '<i class="fa fa-file-text"></i>', ['kpi-sum/view', 'id'=> $model['id']]) : '';

                }
            ]
        );

        array_push($columns,
            [
                'format'=>'html',
                'label' => 'Quick Win Q2', 'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['qwin_q2'] && $model['qwin_q2'] != 'null' ? Html::a( '<i class="fa fa-file-text"></i>', ['kpi-sum/view', 'id'=> $model['id']]) : '';

                }
            ]
        );

        array_push($columns,
            [
                'format'=>'html',
                'label' => 'Quick Win Q2', 'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget)  {
                    return $model['qwin_q3'] && $model['qwin_q3'] != 'null' ? Html::a( '<i class="fa fa-file-text"></i>', ['kpi-sum/view', 'id'=> $model['id']]) : '';

                }
            ]
        );

        array_push($columns,
            [
                'format'=>'html',
                'label' => 'Quick Win Q4', 'hAlign' => 'center',
                'value' => function ($model, $key, $index, $widget)  {
                    return $model['qwin_q4'] && $model['qwin_q4'] != 'null' ? Html::a( '<i class="fa fa-file-text"></i>', ['kpi-sum/view', 'id'=> $model['id']]) : '';

                }
            ]
        );




        array_push($columns, ['label' => 'Last update', 'attribute' => 'last_update', 'noWrap' => true,'class' => '\kartik\grid\FormulaColumn',
//            'pageSummary' => function ($summary, $data, $widget)  {
//                return 'Count is ' . ($GLOBALS['sum_a']/$GLOBALS['sum_b'])*100;
//            },
//            'value'=>function ($model, $key, $index, $widget) {
//                $p = compact('model', 'key', 'index');
//                return $model['provname'] ;
//            },

        ]);
        ?>



        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'hover' => true,
            'responsive' => false,
            'containerOptions' => ['style' => 'overflow: auto', 'class' => 'panel-inverse'],
            //'condensed' => true,
            'responsiveWrap' => false,
//            'floatHeader'=>true,
//            'floatHeaderOptions'=>['scrollingTop'=>'0'],

            'columns' => $columns,
            'showPageSummary' => true,
            'toolbar' => [

                '{export}',
            ],
            'export' => [
                'target' => '_self',
                'fontAwesome' => true,
                'options' => ['class' => 'btn btn-sm btn-warning'],
                'icon' => 'download-alt',
                'label' => 'Download'
            ],

            'panel' => [
                'type' => GridView::TYPE_DEFAULT,
                'heading' => '<h3 class="panel-title"><i class="fa fa-th-large"></i> ' . $this->title . '</h3>',
                'footer' =>  false
            ],
            'containerOptions' => ['style' => 'overflow: auto;-webkit-overflow-scrolling:touch', 'class' => 'panel-inverse'],

        ]); ?>

        <?=$sum_b?>
    </div>
</div>
<?php
    }
?>


<?php
if ($embeded != '1' || ($embeded == '1' && $desc == '1')) {
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">รายละเอียดตัวชี้วัด</h3>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <caption>Description</caption>
            <tbody>
            <tr>
                <td width="140px">คำอธิบาย</td>
                <td><?= $kpi[0]['description'] ?></td>
            </tr>
            <tr>
                <td>ตัวแปร</td>
                <td>

                    <?php if ($kpi[0]['a_desc'] != "") {
                        echo '<br><br><span class="badge element-bg-color-orange">A</span> = ' . $kpi[0]['a_desc'].' ('.$kpi[0]['a_unit'].')';
                    } ?>
                    <?php if ($kpi[0]['b_desc'] != "") {
                        echo '<br><br><span class="badge element-bg-color-blue">B</span> = ' . $kpi[0]['b_desc'].' ('.$kpi[0]['b_unit'].')';
                    } ?>
                    <?php if ($kpi[0]['c_desc'] != "") {
                        echo '<br><br><span class="badge element-bg-color-red">C</span> = ' . $kpi[0]['c_desc'].' ('.$kpi[0]['c_unit'].')';
                    } ?>
                    <?php if ($kpi[0]['d_desc'] != "") {
                        echo '<br><br><span class="badge element-bg-color-red">D</span> = ' . $kpi[0]['d_desc'].' ('.$kpi[0]['d_unit'].')';
                    } ?>
                    <?php if ($kpi[0]['e_desc'] != "") {
                        echo '<br><br><span class="badge element-bg-color-red">E</span> = ' . $kpi[0]['c_desc'].' ('.$kpi[0]['e_unit'].')';
                    } ?>
                    <?php if ($kpi[0]['f_desc'] != "") {
                        echo '<br><br><span class="badge element-bg-color-red">F</span> = ' . $kpi[0]['d_desc'].' ('.$kpi[0]['f_unit'].')';
                    } ?>
                </td>
            </tr>
            <tr>
                <td>สูตรคำนวนตัวชี้วัด</td>
                <td><?= $kpi[0]['formula'] ?></td>
            </tr>


            <tr>
                <td></td>
                <td>
                    <a href="<?= Url::toRoute(['kpi-list/view', 'id' => $kpi[0]['id']]) ?>" class="btn btn-default pull-right"
                       role="button">รายละเอียด KPI Template >></a>

                </td>
            </tr>

            </tbody>
        </table>
    </div>
</div>

<?php
    }
?>




<?php
if ($embeded != '1' || ($embeded == '1' && $comment == '1')) {
?>


    <div class="widget">
    <div class="widget-header">
    <h3><i class="fa fa-comment"></i> Comments</h3>
        </div>
        <div class="widget-content">
    <ul class="list-unstyled activity-list">


        <?php


        for ($i = 0; $i < sizeof($comments); $i++) {

            ?>
            <li>
<!--                            <div class="btn-group pull-right activity-actions">-->
<!--                    <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown">-->
<!--                        <i class="fa fa-angle-down"></i>-->
<!--                        <span class="sr-only">Toggle Dropdown</span>-->
<!--                    </button>-->
<!--                    <ul class="dropdown-menu dropdown-menu-right" role="menu">-->
<!--                        <li><a href="#">แก้ไข</a></li>-->
<!--                        <li><a href="#">ลบ</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
                <img src="<?=Profile::getAvatarByUserId($comments[$i]['user_id'])?>" alt="Avatar"
                     class="img-circle pull-left avatar" style="max-width: 48px; margin-right: 10px;">

                <p><strong><?= $comments[$i]['user_name'] ?></strong> <i
                        class="fa fa-comment-o"></i> <?= $comments[$i]['comment'] ?>
                    <span class="timestamp"><?= time_elapsed_string($comments[$i]['comment_date'], false) ?></span></p>




            </li>


            <?php
        }

        if (sizeof($comments) == 0) {
            echo "ไม่มี Comment";
        }
        ?>
    </ul>


    <a class="btn btn-primary" type="button" id="comment" data-toggle="collapse" data-target="#comments"
       aria-expanded="false" aria-controls="collapseExample" href="#comment"> เขียน Comment<i
            class="fa fa-comment pull-left"></i></a>

    <?PHP $this->registerJs('        $("a#comment").click(
            function(){
                $("html, body").animate({ scrollTop: $(document).height() }, 800);
        });
', yii\web\View::POS_END, 'my-options'); ?>


    <div class="collapse panel panel-default" id="comments">
        <div class="panel-body">
            <?= $this->render('_comments_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
    <a name="comment"></a>

</div>
    </div>
</div>
<?php
    }
?>

<?php
if ($embeded != '1' || ($embeded == '1' && $gis == '1')) {
    ?>
    <?php
    $this->registerCss("                    .info {
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
                    }");


    $this->registerCssFile("http://203.157.145.19/leaflet/leaflet.css");
    $this->registerJsFile('http://203.157.145.19/leaflet/leaflet.js', ['depends' => [\yii\web\JqueryAsset::className()]]);


    $this->registerJs("
                 function getColor(d) {

                 var percent = d;
                 var operator = '" . $operator . "';
                 var goal = " . $goal . ";

                        return d == null ? '#777' :
                            operator == '=' ? (percent == goal  ? '" . $color_success . "' :'" . $color_fail . "') :
                                operator == '>=' ? (percent >= goal  ? '" . $color_success . "' :'" . $color_fail . "') :
                                    operator == '<=' ? (percent <= goal  ? '" . $color_success . "' :'" . $color_fail . "') :
                                        operator == '>' ? (percent > goal  ? '" . $color_success . "' :'" . $color_fail . "') :
                                            operator == '<' ? (percent < goal  ? '" . $color_success . "' :'" . $color_fail . "') :
                                                    '#777';
                    }



                    function style(feature) {
                        return {
                            fillColor: getColor(feature.properties.data),
                            weight: 2,
                            opacity: 1,
                            color: 'white',
                            dashArray: '3',
                            fillOpacity: 0.7
                        };
                    }

                    function highlightFeature(e) {
                        var layer = e.target;

                        layer.setStyle({
                            weight: 4,
                            color: '#666',
                            dashArray: '',
                            fillOpacity: 0.7
                        });

                        if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                            layer.bringToFront();
                        }

                        info.update(layer.feature.properties);
                    }


                    function resetHighlight(e) {
                        geojson.resetStyle(e.target);
                        info.update();
                    }

                    function zoomToFeature(e) {
                        map.fitBounds(e.target.getBounds());
                    }

                    function goTo(e) {
                        var lv = " . $lv . ";
                        if (lv == 0) {
                            lv = lv+2;
                        } else {
                            lv++;
                        }

                        if (lv < 3) {
                        window.location = '" . Url::toRoute(['kpi/index', 'id'=>$id]) . "&lv=' + lv + '&z=' + e.target.feature.properties.id;
                        }
                    }


                    function onEachFeature(feature, layer) {
                        layer.on({
                            mouseover: highlightFeature,
                            mouseout: resetHighlight,
                            click: goTo
                        });
                    }

                    var mapboxAccessToken = 'pk.eyJ1Ijoic2hvbmdwb24iLCJhIjoiY2l0c295d3o3MDAwNzJ6cjI2b3prbGo2MCJ9.Ns27-EE-cdcw1N0JuyZdww';
                    var map = L.map('map',{zoomControl:false}).setView([13.641101, 100.886799], 4);

                        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + mapboxAccessToken, {
                            id: 'mapbox.light',
                            //attribution: ...
                        }).addTo(map);



                    map.dragging.disable();
                    map.touchZoom.disable();
                    map.doubleClickZoom.disable();
                    map.scrollWheelZoom.disable();
                    map.boxZoom.disable();
                    map.keyboard.disable();
                    if (map.tap) map.tap.disable();
                    document.getElementById('map').style.cursor='default';


                    $.ajax({
                    dataType: 'json',
                    url: '" . Url::toRoute(['kpi/gis', 'id' => $id, 'lv' => $lv, 'z' => $z]) . "',
                    success: function(data) {
                        geojson = L.geoJson(data, {
                                style: style,
                                onEachFeature: onEachFeature
                        }).addTo(map);

                        map.fitBounds(geojson.getBounds());
                    }
                    }).error(function() {});

                    //map.fitBounds(geojson.getBounds());


                    var info = L.control();

                    info.onAdd = function (map) {
                        this._div = L.DomUtil.create('div', 'info');
                        this.update();
                        return this._div;
                    };

                    // method that we will use to update the control based on feature properties passed
                    info.update = function (props) {
                        this._div.innerHTML = (props ?
                            '<h4><b>' + props.name + '</b></h4>' + props.data + ' (" . $kpi[0]['kpi_unit'] . ")'
                                : 'Hover over a map polygon');
                    };

                    info.addTo(map);

                 ", View::POS_READY, 'my-map');

    ?>

    <?php
}
?>
