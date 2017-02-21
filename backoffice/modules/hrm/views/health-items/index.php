<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'เครื่องมือแพทย์';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-sm-8 col-md-9 col-lg-10">


        <div class="panel">
            <div class="panel-heading">
                <h2><?= $this->title ?></h2>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php


                    $columns = [
                        ['class' => 'kartik\grid\SerialColumn'],
                        ['label' => 'เครื่องมือแพทย์', 'attribute' => 'item_name'],
                        ['attribute' => 'สมุทรปราการ', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['สมุทรปราการ'], ['/hrm/health-items/index', 'hrm_title' => $model['item_name'] . ' จ.สมุทรปราการ', 'ProfileSearch[item_code]' => $model['item_code'], 'ProfileSearch[chw_part]' => '11']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'item_code' => $model['item_code'], 'provcode' => '11']);
                        },
                            'format' => 'raw'],

                        ['attribute' => 'ชลบุรี', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['ชลบุรี'], ['/hrm/health-items/index', 'hrm_title' => $model['item_name'] . ' จ.ชลบุรี', 'ProfileSearch[item_code]' => $model['item_code'], 'ProfileSearch[chw_part]' => '20']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'item_code' => $model['item_code'], 'provcode' => '20']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'ระยอง', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['ระยอง'], ['/hrm/health-items/index', 'hrm_title' => $model['item_name'] . ' จ.ระยอง', 'ProfileSearch[item_code]' => $model['item_code'], 'ProfileSearch[chw_part]' => '21']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'item_code' => $model['item_code'], 'provcode' => '21']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'จันทบุรี', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['จันทบุรี'], ['/hrm/health-items/index', 'hrm_title' => $model['item_name'] . ' จ.จันทบุรี', 'ProfileSearch[item_code]' => $model['item_code'], 'ProfileSearch[chw_part]' => '22']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'item_code' => $model['item_code'], 'provcode' => '22']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'ตราด', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['ตราด'], ['/hrm/health-items/index', 'hrm_title' => $model['item_name'] . ' จ.ตราด', 'ProfileSearch[item_code]' => $model['item_code'], 'ProfileSearch[chw_part]' => '23']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'item_code' => $model['item_code'], 'provcode' => '23']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'ฉะเชิงเทรา', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['ฉะเชิงเทรา'], ['/hrm/health-items/index', 'hrm_title' => $model['item_name'] . ' จ.ฉะเชิงเทรา', 'ProfileSearch[item_code]' => $model['item_code'], 'ProfileSearch[chw_part]' => '24']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'item_code' => $model['item_code'], 'provcode' => '24']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'ปราจีนบุรี', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['ปราจีนบุรี'], ['/hrm/health-items/index', 'hrm_title' => $model['item_name'] . ' จ.ปราจีนบุรี', 'ProfileSearch[item_code]' => $model['item_code'], 'ProfileSearch[chw_part]' => '25']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'item_code' => $model['item_code'], 'provcode' => '25']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'สระแก้ว', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['สระแก้ว'], ['/hrm/health-items/index', 'hrm_title' => $model['item_name'] . ' จ.สระแก้ว', 'ProfileSearch[item_code]' => $model['item_code'], 'ProfileSearch[chw_part]' => '27']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'item_code' => $model['item_code'], 'provcode' => '27']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'รวม', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['รวม'], ['/hrm/health-items/index', 'hrm_title' => $model['item_name'] . ' เขตสุขภาพที่ 6', 'ProfileSearch[item_code]' => $model['item_code'], 'ProfileSearch[chw_part]' => '']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'item_code' => $model['item_code'], 'provcode' => '11,20,21,22,23,24,25,27']);
                        },
                            'format' => 'raw'],

                    ];

                    echo GridView::widget([

                            'dataProvider' => $dataProvider,


                            'export' => [
                                'target' => '_self',
                                'fontAwesome' => true,
                                'options' => ['class' => 'btn btn-sm btn-warning'],
                                'icon' => 'download-alt',
                                'label' => 'Download'
                            ],
                            'columns' => $columns,
                            'striped' => true,
                            'bordered' => true,
                            'hover' => true,
                            'resizableColumns' => false,
                            'pjax' => false,
                            'containerOptions' => ['style' => 'overflow: auto;-webkit-overflow-scrolling:touch', 'class' => 'panel-inverse'],
                            'condensed' => true,
                            'showPageSummary' => false,
                            'responsiveWrap' => false,
                            'responsive' => false,
//                    'panel' => [
//                        'type' => GridView::TYPE_DEFAULT,
//                        'heading' => '<h3 class="panel-title"><i class="fa fa-th-large"></i> ' . $this->title . '</h3>',
//                        'footer' => false
//                    ],
//                    'toggleDataOptions' => [
//                        'all' => [
//                            'icon' => 'resize-full',
//                            'label' => 'All',
//                            'class' => 'btn btn-sm btn-success',
//                            'title' => 'Show all data'
//                        ],
//                        'page' => [
//                            'icon' => 'resize-small',
//                            'label' => 'Page',
//                            'class' => 'btn btn-sm btn-success',
//                            'title' => 'Show first page data'
//                        ],
//                    ],
                            //'showPageSummary' => true,
//                    'panel' => [
//                        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> จำนวนเด็กที่มีอายุครบ 9, 18, 30, 42 เดือน เขตสุขภาพที่ 6</h3>',
//                        'footer' => false],


                        ]


                    );


                    ?>
                </div>
                <!-- table-responsive -->
            </div>
        </div>
        <!-- panel -->

        <div class="people-list">
            <div class="people-options clearfix">


                <div class="btn-group pull-right people-pager">
                    <?= Html::a('<i class="fa fa-user-plus"></i><span><b> เพิ่มครุภัณฑ์</b><span>', ['health-items/create'], ['class' => 'btn btn-success btn-quirk']) ?>

                </div>

            </div>
        </div>

    </div>
    <div class="col-sm-4 col-md-3 col-lg-2">
        <?= $this->render('/default/nav') ?>

        <!-- panel -->
    </div>
</div>
