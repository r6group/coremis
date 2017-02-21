<?php

use yii\helpers\Url;
use yii\web\View;
use miloschuman\highcharts\Highcharts;


/* @var $this yii\web\View */
$this->title = 'KPI Center';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="content">
    <div class="main-header">
        <h2>KPI</h2>
        <em>KEY PERFORMANCE INDICATORS</em>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="widget">
                <div class="col-md-4">

                    <div class="market-news">
                        <h3 class="heading">Top News</h3>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#" class="news-thumbnail"><img
                                        src="http://demo.thedevelovers.com/dashboard/kingadmin-v1.6.1/assets/img/market-news.jpg"
                                        class="img-responsive" alt="Top News"></a>
                                <a href="#" class="title">Intrinsicly leverage existing state of the art metrics
                                    with
                                    integrated niche markets</a>
                            </li>
                            <li>
                                <a href="#" class="title">Enthusiastically formulate leveraged technologies</a>
                            </li>
                            <li>
                                <a href="#" class="title">Efficiently drive mission-critical applications rather
                                    than
                                    real-time</a>
                            </li>
                            <li>
                                <a href="#" class="title">Proactively harness backward-compatible core competencies
                                    with
                                    fully</a>
                            </li>
                            <li>
                                <a href="#" class="title">Credibly drive sustainable networks</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="market-news">
                        <h3 class="heading">Economy</h3>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#" class="news-thumbnail"><img
                                        src="http://demo.thedevelovers.com/dashboard/kingadmin-v1.6.1/assets/img/market-news2.jpg"
                                        class="img-responsive" alt="Top News"></a>
                                <a href="#" class="title">Conveniently communicate transparent markets for transparent
                                    testing procedures</a>
                            </li>
                            <li>
                                <a href="#" class="title">Holisticly aggregate an expanded array of synergy</a>
                            </li>
                            <li>
                                <a href="#" class="title">Assertively incubate backward-compatible niche markets without
                                    focused sources</a>
                            </li>
                            <li>
                                <a href="#" class="title">Conveniently pursue mission-critical relationships through
                                    error-free innovation</a>
                            </li>
                            <li>
                                <a href="#" class="title">Assertively implement value-added scenarios whereas global
                                    action items</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="market-news">
                        <h3 class="heading">Finance</h3>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#" class="news-thumbnail"><img
                                        src="http://demo.thedevelovers.com/dashboard/kingadmin-v1.6.1/assets/img/market-news3.jpg"
                                        class="img-responsive" alt="Top News"></a>
                                <a href="#" class="title">Quickly conceptualize enabled human capital </a>
                            </li>
                            <li>
                                <a href="#" class="title">Globally enable collaborative manufactured products</a>
                            </li>
                            <li>
                                <a href="#" class="title">Completely monetize resource maximizing imperatives</a>
                            </li>
                            <li>
                                <a href="#" class="title">Holisticly mesh robust channels with emerging capital</a>
                            </li>
                            <li>
                                <a href="#" class="title">Globally evisculate high-payoff</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- WIDGET KPI LAST UPDATE -->
        <div class="widget">
            <div class="widget-header">
                <h3><i class="fa fa-edit"></i> Recent Updates KPI Data</h3> <em>- KPI
                    ที่มีการปรับปรุงข้อมูลล่าสุด</em>

                <div class="btn-group widget-header-toolbar">
                    <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                    <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i
                            class="fa fa-chevron-up"></i></a>
                    <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="widget-content">
                <ul class="list-unstyled activity-list">
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


