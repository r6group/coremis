<?php

use yii\helpers\Url;
use yii\web\View;
use miloschuman\highcharts\Highcharts;
use kartik\grid\GridView;

/* @var $this yii\web\View */
$this->title = 'Activities';
//$this->params['breadcrumbs'][] = $this->title;
?>


<div class="content">
    <div class="widget">
        <div class="widget-content">
            <div>
                <h3><i class="fa fa-history"></i> Activities</h3>
            </div>
        </div>
    </div>


    <div class="main-content">



        <!-- WIDGET KPI LAST UPDATE -->
        <div class="widget">

            <div class="widget-content">
                <ul class="list-unstyled activity-list">
                    <?php

                    function time_elapsed_string($datetime, $full = false)
                    {
                        $now = new DateTime;

                        $ago = new DateTime($datetime);

//                        $now->setTimezone(new DateTimeZone('Asia/Bangkok'));
//                        $ago->setTimezone(new DateTimeZone('Asia/Bangkok'));


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


                    for ($i = 0; $i < sizeof($kpi_update); $i++) {


                        ?>


                        <li>
                            <i class="fa fa-pencil activity-icon pull-left"></i>

                            <p>
                                <?= $kpi_update[$i]['provname'] ?> Update ข้อมูล <i
                                    class="fa fa-bar-chart-o fw"></i> <a
                                    href="<?= Yii::$app->urlManager->createUrl(['kpi/index', 'id' => $kpi_update[$i]['kpi_id']]) ?>"><?= $kpi_update[$i]['title'] ?></a>

                            <div class="label label-success pull-right"><?= $kpi_update[$i]['kpi_year'] ?></div>
                            <div class="label label-primary pull-right">
                                ตัวชี้วัดระดับ<?= $kpi_update[$i]['kpi_level'] ?> </div><span
                                class="timestamp"><?= time_elapsed_string($kpi_update[$i]['last_update'], false) ?>
                                (<?= $kpi_update[$i]['last_update'] ?>)</span>
                            </p>
                        </li>

                        <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
        <!-- WIDGET KPI LAST UPDATE -->
    </div>
    <!-- /main-content -->

</div>

