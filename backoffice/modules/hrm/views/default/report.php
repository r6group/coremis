<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Report';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-sm-8 col-md-9 col-lg-10">


        <div class="panel">
            <div class="panel-heading">
                <h2>บุคลากรทางการแทพย์และสุขภาพ</h2>

            </div>
            <div class="panel-body">


                <div class="table-responsive">
                    <?php


                    $columns = [
                        ['class' => 'kartik\grid\SerialColumn'],
                        ['label' => 'ตำแหน่ง', 'attribute' => 'full_posname'],
                        ['attribute' => 'สมุทรปราการ', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['สมุทรปราการ'], ['/hrm/default/index', 'hrm_title' => $model['full_posname'] . ' จ.สมุทรปราการ', 'ProfileSearch[main_pst]' => $model['poscode'], 'ProfileSearch[chw_part]' => '11']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'main_pst' => $model['poscode'], 'provcode' => '11']);
                        },
                            'format' => 'raw'],

                        ['attribute' => 'ชลบุรี', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['ชลบุรี'], ['/hrm/default/index', 'hrm_title' => $model['full_posname'] . ' จ.ชลบุรี', 'ProfileSearch[main_pst]' => $model['poscode'], 'ProfileSearch[chw_part]' => '20']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'main_pst' => $model['poscode'], 'provcode' => '20']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'ระยอง', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['ระยอง'], ['/hrm/default/index', 'hrm_title' => $model['full_posname'] . ' จ.ระยอง', 'ProfileSearch[main_pst]' => $model['poscode'], 'ProfileSearch[chw_part]' => '21']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'main_pst' => $model['poscode'], 'provcode' => '21']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'จันทบุรี', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['จันทบุรี'], ['/hrm/default/index', 'hrm_title' => $model['full_posname'] . ' จ.จันทบุรี', 'ProfileSearch[main_pst]' => $model['poscode'], 'ProfileSearch[chw_part]' => '22']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'main_pst' => $model['poscode'], 'provcode' => '22']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'ตราด', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['ตราด'], ['/hrm/default/index', 'hrm_title' => $model['full_posname'] . ' จ.ตราด', 'ProfileSearch[main_pst]' => $model['poscode'], 'ProfileSearch[chw_part]' => '23']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'main_pst' => $model['poscode'], 'provcode' => '23']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'ฉะเชิงเทรา', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['ฉะเชิงเทรา'], ['/hrm/default/index', 'hrm_title' => $model['full_posname'] . ' จ.ฉะเชิงเทรา', 'ProfileSearch[main_pst]' => $model['poscode'], 'ProfileSearch[chw_part]' => '24']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'main_pst' => $model['poscode'], 'provcode' => '24']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'ปราจีนบุรี', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['ปราจีนบุรี'], ['/hrm/default/index', 'hrm_title' => $model['full_posname'] . ' จ.ปราจีนบุรี', 'ProfileSearch[main_pst]' => $model['poscode'], 'ProfileSearch[chw_part]' => '25']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'main_pst' => $model['poscode'], 'provcode' => '25']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'สระแก้ว', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['สระแก้ว'], ['/hrm/default/index', 'hrm_title' => $model['full_posname'] . ' จ.สระแก้ว', 'ProfileSearch[main_pst]' => $model['poscode'], 'ProfileSearch[chw_part]' => '27']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'main_pst' => $model['poscode'], 'provcode' => '27']);
                        },
                            'format' => 'raw'],
                        ['attribute' => 'รวม', 'class' => '\kartik\grid\DataColumn', 'pageSummary' => true, 'hAlign' => 'right'
                            , 'value' => function ($model, $key, $index, $column) {
                            return Html::a($model['รวม'], ['/hrm/default/index', 'hrm_title' => $model['full_posname'] . ' เขตสุขภาพที่ 6', 'ProfileSearch[main_pst]' => $model['poscode'], 'ProfileSearch[chw_part]' => '']) . ' ' . Html::a('<i class="fa fa-map-marker tooltips" title="GIS" data-placement="top" data-toggle="tooltip" style="color: #9fa8bc"></i>', ['/hrm/default/map', 'main_pst' => $model['poscode'], 'provcode' => '11,20,21,22,23,24,25,27']);
                        },
                            'format' => 'raw'],

                    ];

                    echo GridView::widget([

                            'dataProvider' => $dataProvider,

//                    'beforeHeader' => [
//                        [
//                            'columns' => [
//                                ['content' => '', 'options' => ['colspan' => 2,]],
//                                ['content' => 'เด็กอายุครบ 9 เดือน', 'options' => ['colspan' => 3, 'class' => 'text-center']],
//                                ['content' => 'เด็กอายุครบ 18 เดือน', 'options' => ['colspan' => 3, 'class' => 'text-center']],
//                                ['content' => 'เด็กอายุครบ 30 เดือน', 'options' => ['colspan' => 3, 'class' => 'text-center']],
//                                ['content' => 'เด็กอายุครบ 42 เดือน', 'options' => ['colspan' => 3, 'class' => 'text-center']],
//                            ],
//                            'options' => ['class' => 'skip-export'] // remove this row from export
//                        ]
//                    ],
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

                <div class="people-options clearfix">
                    <div class="btn-toolbar pull-left">

                        <?= Html::a('<i class="fa fa-user-plus"></i><span><b> เพิ่มบุคลากร</b><span>', ['default/create'], ['class' => 'btn btn-sm btn-success btn-quirk']) ?>

                    </div>

                </div>
            </div>
        </div>
        <!-- panel -->
    </div>
    <div class="col-sm-4 col-md-3 col-lg-2">
        <?= $this->render('nav') ?>
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">Filter Users</h4>
            </div>
            <?php $form = ActiveForm::begin([
                'action' => ['/hrm/default/index'],
                'method' => 'get',
            ]); ?>


            <div class="panel-body">
                <div class="form-group">
                    <?= $form->field($searchModel, 'name') ?>
                </div>
                <div class="form-group">
                    <?= $form->field($searchModel, 'mobile_tel') ?>

                </div>
                <div class="form-group">
                    <?= $form->field($searchModel, 'email') ?>

                </div>
                <div class="form-group">
                    <label class="control-label center-block">Gender:</label>
                    <label class="ckbox ckbox-inline mr20">
                        <input type="checkbox" checked><span>Female</span>
                    </label>
                    <label class="ckbox ckbox-inline">
                        <input type="checkbox" checked><span>Male</span>
                    </label>
                </div>
                <?= Html::submitButton('Filter List', ['class' => 'btn btn-success btn-quirk btn-block']) ?>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <!-- panel -->
    </div>
</div>
