<?php

use yii\helpers\Url;
use yii\web\View;
use miloschuman\highcharts\Highcharts;
use kartik\grid\GridView;

/* @var $this yii\web\View */
$this->title = 'Report Status';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget">
    <div class="widget-content">
        <div>
            <h3><i class="fa fa-area-chart"></i> KPI ที่ต้องรายงานในไตรมาส 1</h3>
        </div>
    </div>
</div>
<div class="widget">
    <div class="widget-header">
        <h3><i class="fa fa-area-chart"></i> ตัวชี้วัดระดับจังหวัด</h3>
    </div>
    <div class="widget-content">
        <div>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
//    'filterModel' => $searchModel,
    //'tableOptions' =>['class' => 'table table-hover'],
    // parameters from the demo form
    'bordered'=>false,
    'striped'=>false,
    'condensed'=>false,
    'responsive'=>true,
    'hover'=>true,

    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'kpi_no',
        'title',
        //'id',
//        'kpi_year',

//        'kpi_level',
        ['label' => 'จังหวัดที่บันทึกครบถ้วน', 'attribute' => 'COMPLETE',
            'format' => 'raw',
            'value'=>function ($model, $key, $index, $widget) {

                return '<span class="badge element-bg-color-green">'.$model['COMPLETE_COUNT'].' จังหวัด</span><p class="text-success">'.$model['COMPLETE'].'</p>' ;
            },
        ],
        ['label' => 'จังหวัดที่บันทึกไม่ครบถ้วน', 'attribute' => 'INCOMPLETE',
            'format' => 'raw',
            'value'=>function ($model, $key, $index, $widget) {

                return '<span class="badge element-bg-color-red">'.$model['INCOMPLETE_COUNT'].' จังหวัด</span><p class="text-danger">'.$model['INCOMPLETE'].'</p>' ;
            },
        ],


    ],
]); ?>
        </div>
    </div>
</div>


<div class="widget">
    <div class="widget-header">
        <h3><i class="fa fa-area-chart"></i> ตัวชี้วัดระดับเขต</h3>
    </div>
    <div class="widget-content">
        <div>
            <?= GridView::widget([
                'dataProvider' => $dataProviderRegion,
//    'filterModel' => $searchModel,
                //'tableOptions' =>['class' => 'table table-hover'],
                // parameters from the demo form
                'bordered'=>false,
                'striped'=>false,
                'condensed'=>false,
                'responsive'=>true,
                'hover'=>true,

                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'kpi_no',
                    'title',
                    //'id',
//        'kpi_year',

//        'kpi_level',
                    ['label' => 'เขตที่บันทึกครบถ้วน', 'attribute' => 'COMPLETE',
                        'format' => 'raw',
                        'value'=>function ($model, $key, $index, $widget) {

                            return '<span class="badge element-bg-color-green">'.$model['COMPLETE_COUNT'].' เขต</span><p class="text-success">'.$model['COMPLETE'].'</p>' ;
                        },
                    ],
                    ['label' => 'เขตที่บันทึกไม่ครบถ้วน', 'attribute' => 'INCOMPLETE',
                        'format' => 'raw',
                        'value'=>function ($model, $key, $index, $widget) {

                            return '<span class="badge element-bg-color-red">'.$model['INCOMPLETE_COUNT'].' เขต</span><p class="text-danger">'.$model['INCOMPLETE'].'</p>' ;
                        },
                    ],


                ],
            ]); ?>
        </div>
    </div>
</div>


<div class="widget">
    <div class="widget-header">
        <h3><i class="fa fa-area-chart"></i> ตัวชี้วัดระดับกระทรวง</h3>
    </div>
    <div class="widget-content">
        <div>
            <?= GridView::widget([
                'dataProvider' => $dataProviderMoph,
//    'filterModel' => $searchModel,
                //'tableOptions' =>['class' => 'table table-hover'],
                // parameters from the demo form
                'bordered'=>false,
                'striped'=>false,
                'condensed'=>false,
                'responsive'=>true,
                'hover'=>true,

                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'kpi_no',
                    'title',
                    //'id',
//        'kpi_year',

//        'kpi_level',
                    ['label' => 'หน่วยงานที่บันทึกครบถ้วน', 'attribute' => 'COMPLETE',
                        'format' => 'raw',
                        'value'=>function ($model, $key, $index, $widget) {

                            return '<span class="badge element-bg-color-green">'.$model['COMPLETE_COUNT'].' หน่วยงาน</span><p class="text-success">'.$model['COMPLETE'].'</p>' ;
                        },
                    ],
                    ['label' => 'หน่วยงานที่บันทึกไม่ครบถ้วน', 'attribute' => 'INCOMPLETE',
                        'format' => 'raw',
                        'value'=>function ($model, $key, $index, $widget) {

                            return '<span class="badge element-bg-color-red">'.$model['INCOMPLETE_COUNT'].' หน่วยงาน</span><p class="text-danger">'.$model['INCOMPLETE'].'</p>' ;
                        },
                    ],


                ],
            ]); ?>
        </div>
    </div>
</div>






