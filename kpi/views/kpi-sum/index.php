<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel kpi\models\KpiSumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kpi Sums';
$this->params['breadcrumbs'][] = $this->title;



function is_editable_term($q = 0, $year = 2560) {
    $today = date('Y-m-d', strtotime(date('Y-m-d')));
    $is_date_range = false;

    if (date('m', strtotime(date('Y-m-d'))) >= 10) {
        $year = $year + 1;
    }

//    echo '<br>m '.date('Y-m-d', strtotime(($year -545)."-12-31"));

    switch ($q) {
        //บันทึกได้ทั้งปี
        case 0:
            $is_date_range = ($today >= date('Y-m-d', strtotime(($year -546)."-10-01"))) && ($today <= date('Y-m-d', strtotime(($year -545)."-12-31")));
            break;
        //บันทึกเมื่อถึง Q1
        case 1:
            $is_date_range = ($today >= date('Y-m-d', strtotime(($year -545)."-10-01"))) && ($today <= date('Y-m-d', strtotime(($year -545)."-12-31")));
            break;
        //บันทึกเมื่อถึง Q2
        case 2:
            $is_date_range = ($today >= date('Y-m-d', strtotime(($year -543)."-01-01"))) && ($today <= date('Y-m-d', strtotime(($year -543)."-03-31")));
            break;
        //บันทึกเมื่อถึง Q3
        case 3:
            $is_date_range = ($today >= date('Y-m-d', strtotime(($year -543)."-04-01"))) && ($today <= date('Y-m-d', strtotime(($year -543)."-06-30")));
            break;
        //บันทึกเมื่อถึง Q4
        case 4:
            $is_date_range = ($today >= date('Y-m-d', strtotime(($year -543)."-07-01"))) && ($today <= date('Y-m-d', strtotime(($year -543)."-09-30")));
            break;
    }

//    return !$is_date_range;
    return false;
}


//echo '<br>ภายในปีงบ '.is_editable_term(0, 2560);
//echo '<br>ไตรมาส 1 '.is_editable_term(1, 2560);
//echo '<br>ไตรมาส 2 '.is_editable_term(2, 2560);
//echo '<br>ไตรมาส 3 '.is_editable_term(3, 2560);
//echo '<br>ไตรมาส 4 '.is_editable_term(4, 2560);
?>
<div class="kpi-sum-index">


    <a href="<?=Url::toRoute(['kpi/index', 'id'=>$kpi[0]['id']])?>" class="btn btn-default pull-right" role="button">กลับไปยังรายงาน KPI >></a>
    <h3><?=$kpi[0]['title']?></h3>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <table class="table table-bordered">
        <caption>Description</caption>
        <tbody>
        <tr>
            <td width="140px">คำอธิบาย</td>
            <td><?=$kpi[0]['description']?></td>
        </tr>
        <tr>
            <td>ตัวแปร</td>
            <td>
                <?php if ($kpi[0]['a_desc'] != "") {
                    echo '<br><br><span class="badge element-bg-color-blue">A</span> = ' . $kpi[0]['a_desc'];
                } ?>
                <?php if ($kpi[0]['b_desc'] != "") {
                    echo '<br><br><span class="badge element-bg-color-orange">B</span> = ' . $kpi[0]['b_desc'];
                } ?>
                <?php if ($kpi[0]['c_desc'] != "") {
                    echo '<br><br><span class="badge element-bg-color-red">C</span> = ' . $kpi[0]['c_desc'];
                } ?>
                <?php if ($kpi[0]['d_desc'] != "") {
                    echo '<br><br><span class="badge element-bg-color-red">D</span> = ' . $kpi[0]['d_desc'];
                } ?>
                <?php if ($kpi[0]['e_desc'] != "") {
                    echo '<br><br><span class="badge element-bg-color-red">E</span> = ' . $kpi[0]['e_desc'];
                } ?>
                <?php if ($kpi[0]['f_desc'] != "") {
                    echo '<br><br><span class="badge element-bg-color-red">F</span> = ' . $kpi[0]['f_desc'];
                } ?>
            </td>
        </tr>
        <tr>
            <td>สูรคำนวนตัวชี้วัด</td>
            <td><?=$kpi[0]['formula']?></td>
        </tr>
        <tr>
            <td>หมายเหตุ</td>
            <td><?=$kpi[0]['remark']?></td>
        </tr>
        </tbody>
    </table>

    <div class="widget">
        <div class="widget-header">
            <h3><i class="fa fa-windows"></i> Data</h3> <em> - <?=$kpi[0]['title']?></em>


        </div>

        <div class="widget-content">
<?php

    $fixed_count = 0;

    $fixed_count = $kpi[0]['fixed_a'] + $kpi[0]['fixed_b'] + $kpi[0]['fixed_c'] + $kpi[0]['fixed_d'] + $kpi[0]['fixed_e'] + $kpi[0]['fixed_f'];
    $value_count = 0;

    $value_q1_count = 0;
    $value_q2_count = 0;
    $value_q3_count = 0;
    $value_q4_count = 0;


    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute'=>'hospcode',
            'value'=>'hosname.hosname',
            'label'=>'หน่วยงาน',
            'noWrap' => true
        ],


        // 'kpi_definition:ntext',
        // 'kpi_a_value',
        // 'kpi_b_value',
//        [
//            'attribute'=>'kpi_result',
//            //'value'=>'provname.provname',
//            'label'=>'ผลลัพท์',
//            //['class' => 'test']
//        ],

        // 'kpi_condition',
        // 'kpi_formula:ntext',
        // 'kpi_sql:ntext',


        //['class' => 'yii\grid\ActionColumn'],
    ];


    if ($kpi[0]['a_desc'] != "" && $kpi[0]['fixed_a'] == 1) {

        array_push($columns, [
            'class'=>'kartik\grid\EditableColumn',
            'attribute'=>'kpi_a_value',
            'header'=>'<span class="badge element-bg-color-blue">A</span>',
            'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
                return is_editable_term(0, $kpi[0]['kpi_year']);
            },
            'editableOptions'=>[
                'header'=>'A Value:'.$kpi[0]['a_desc'],
                'options'=>[
                    'pluginOptions'=>['min'=>0, 'max'=>50000]
                ]
            ],
            'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
        ]);
    }

    if ($kpi[0]['b_desc'] != "" && $kpi[0]['fixed_b'] == 1) {
        array_push($columns, [
            'class'=>'kartik\grid\EditableColumn',
            'attribute'=>'kpi_b_value',
            'header'=>'<span class="badge element-bg-color-orange">B</span>',
            'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
                return is_editable_term(0, $kpi[0]['kpi_year']);
            },
            'editableOptions'=>[
                'header'=>'B Value:'.$kpi[0]['b_desc'],
                'options'=>[
                    'pluginOptions'=>['min'=>0, 'max'=>50000]
                ]
            ],
            'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
        ]);
    }


    if ($kpi[0]['c_desc'] != "" && $kpi[0]['fixed_c'] == 1) {
        array_push($columns, [
            'class'=>'kartik\grid\EditableColumn',
            'attribute'=>'kpi_c_value',
            'header'=>'<span class="badge">C</span>',
            'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
                return is_editable_term(0, $kpi[0]['kpi_year']);
            },
            'editableOptions'=>[
                'header'=>'C Value:'.$kpi[0]['c_desc'],
                'options'=>[
                    'pluginOptions'=>['min'=>0, 'max'=>50000]
                ]
            ],
            'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
        ]);
    }

    if ($kpi[0]['d_desc'] != "" && $kpi[0]['fixed_d'] == 1) {
        array_push($columns, [
            'class'=>'kartik\grid\EditableColumn',
            'attribute'=>'kpi_d_value',
            'header'=>'<span class="badge">D</span>',
            'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
                return is_editable_term(0, $kpi[0]['kpi_year']);
            },
            'editableOptions'=>[
                'header'=>'D Value:'.$kpi[0]['d_desc'],
                'options'=>[
                    'pluginOptions'=>['min'=>0, 'max'=>50000]
                ]
            ],
            'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
        ]);
    }

    if ($kpi[0]['e_desc'] != "" && $kpi[0]['fixed_e'] == 1) {
        array_push($columns, [
            'class'=>'kartik\grid\EditableColumn',
            'attribute'=>'kpi_e_value',
            'header'=>'<span class="badge">E</span>',
            'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
                return is_editable_term(0, $kpi[0]['kpi_year']);
            },
            'editableOptions'=>[
                'header'=>'E Value:'.$kpi[0]['e_desc'],
                'options'=>[
                    'pluginOptions'=>['min'=>0, 'max'=>50000]
                ]
            ],
            'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
        ]);
    }

    if ($kpi[0]['f_desc'] != "" && $kpi[0]['fixed_f'] == 1) {
        array_push($columns, [
            'class'=>'kartik\grid\EditableColumn',
            'attribute'=>'kpi_f_value',
            'header'=>'<span class="badge">F</span>',
            'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
                return is_editable_term(0, $kpi[0]['kpi_year']);
            },
            'editableOptions'=>[
                'header'=>'F Value:'.$kpi[0]['f_desc'],
                'options'=>[
                    'pluginOptions'=>['min'=>0, 'max'=>50000]
                ]
            ],
            'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
        ]);
    }







//ไตรมาส 1

if ($kpi[0]['a_desc'] != "" && $kpi[0]['fixed_a'] != 1 && $kpi[0]['q1_goal'] > 0) {
    $value_q1_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_a_value_q1',
        'header'=>'<span class="badge element-bg-color-blue">A</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(1, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'A Value:'.$kpi[0]['a_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['b_desc'] != "" && $kpi[0]['fixed_b'] != 1 && $kpi[0]['q1_goal'] > 0) {
    $value_q1_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_b_value_q1',
        'header'=>'<span class="badge element-bg-color-orange">B</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(1, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'B Value:'.$kpi[0]['b_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}


if ($kpi[0]['c_desc'] != "" && $kpi[0]['fixed_c'] != 1 && $kpi[0]['q1_goal'] > 0) {
    $value_q1_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_c_value_q1',
        'header'=>'<span class="badge">C</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(1, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'C Value:'.$kpi[0]['c_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['d_desc'] != "" && $kpi[0]['fixed_d'] != 1 && $kpi[0]['q1_goal'] > 0) {
    $value_q1_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_d_value_q1',
        'header'=>'<span class="badge">D</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(1, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'D Value:'.$kpi[0]['d_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['e_desc'] != "" && $kpi[0]['fixed_e'] != 1 && $kpi[0]['q1_goal'] > 0) {
    $value_q1_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_e_value_q1',
        'header'=>'<span class="badge">E</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(1, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'E Value:'.$kpi[0]['e_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['f_desc'] != "" && $kpi[0]['fixed_f'] != 1 && $kpi[0]['q1_goal'] > 0) {
    $value_q1_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_f_value_q1',
        'header'=>'<span class="badge">F</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(1, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'F Value:'.$kpi[0]['f_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}




//ไตรมาส 2

if ($kpi[0]['a_desc'] != "" && $kpi[0]['fixed_a'] != 1 && $kpi[0]['q2_goal'] > 0) {
    $value_q2_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_a_value_q2',
        'header'=>'<span class="badge element-bg-color-blue">A</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(2, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'A Value:'.$kpi[0]['a_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['b_desc'] != "" && $kpi[0]['fixed_b'] != 1 && $kpi[0]['q2_goal'] > 0) {
    $value_q2_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_b_value_q2',
        'header'=>'<span class="badge element-bg-color-orange">B</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(2, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'B Value:'.$kpi[0]['b_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}


if ($kpi[0]['c_desc'] != "" && $kpi[0]['fixed_c'] != 1 && $kpi[0]['q2_goal'] > 0) {
    $value_q2_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_c_value_q2',
        'header'=>'<span class="badge">C</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(2, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'C Value:'.$kpi[0]['c_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['d_desc'] != "" && $kpi[0]['fixed_d'] != 1 && $kpi[0]['q2_goal'] > 0) {
    $value_q2_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_d_value_q2',
        'header'=>'<span class="badge">D</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(2, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'D Value:'.$kpi[0]['d_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['e_desc'] != "" && $kpi[0]['fixed_e'] != 1 && $kpi[0]['q2_goal'] > 0) {
    $value_q2_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_e_value_q2',
        'header'=>'<span class="badge">E</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(2, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'E Value:'.$kpi[0]['e_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['f_desc'] != "" && $kpi[0]['fixed_f'] != 1 && $kpi[0]['q2_goal'] > 0) {
    $value_q2_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_f_value_q2',
        'header'=>'<span class="badge">F</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(2, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'F Value:'.$kpi[0]['f_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}



//ไตรมาส 3

if ($kpi[0]['a_desc'] != "" && $kpi[0]['fixed_a'] != 1 && $kpi[0]['q3_goal'] > 0) {
    $value_q3_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_a_value_q3',
        'header'=>'<span class="badge element-bg-color-blue">A</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(3, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'A Value:'.$kpi[0]['a_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['b_desc'] != "" && $kpi[0]['fixed_b'] != 1 && $kpi[0]['q3_goal'] > 0) {
    $value_q3_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_b_value_q3',
        'header'=>'<span class="badge element-bg-color-orange">B</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(3, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'B Value:'.$kpi[0]['b_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}


if ($kpi[0]['c_desc'] != "" && $kpi[0]['fixed_c'] != 1 && $kpi[0]['q3_goal'] > 0) {
    $value_q3_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_c_value_q3',
        'header'=>'<span class="badge">C</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(3, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'C Value:'.$kpi[0]['c_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['d_desc'] != "" && $kpi[0]['fixed_d'] != 1 && $kpi[0]['q3_goal'] > 0) {
    $value_q3_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_d_value_q3',
        'header'=>'<span class="badge">D</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(3, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'D Value:'.$kpi[0]['d_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['e_desc'] != "" && $kpi[0]['fixed_e'] != 1 && $kpi[0]['q3_goal'] > 0) {
    $value_q3_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_e_value_q3',
        'header'=>'<span class="badge">E</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(3, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'E Value:'.$kpi[0]['e_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['f_desc'] != "" && $kpi[0]['fixed_f'] != 1 && $kpi[0]['q3_goal'] > 0) {
    $value_q3_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_f_value_q3',
        'header'=>'<span class="badge">F</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(3, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'F Value:'.$kpi[0]['f_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}



//ไตรมาส 4

if ($kpi[0]['a_desc'] != "" && $kpi[0]['fixed_a'] != 1 && $kpi[0]['q4_goal'] > 0) {
    $value_q4_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_a_value_q4',
        'header'=>'<span class="badge element-bg-color-blue">A</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(4, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'A Value:'.$kpi[0]['a_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['b_desc'] != "" && $kpi[0]['fixed_b'] != 1 && $kpi[0]['q4_goal'] > 0) {
    $value_q4_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_b_value_q4',
        'header'=>'<span class="badge element-bg-color-orange">B</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(4, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'B Value:'.$kpi[0]['b_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}


if ($kpi[0]['c_desc'] != "" && $kpi[0]['fixed_c'] != 1 && $kpi[0]['q4_goal'] > 0) {
    $value_q4_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_c_value_q4',
        'header'=>'<span class="badge">C</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(4, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'C Value:'.$kpi[0]['c_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['d_desc'] != "" && $kpi[0]['fixed_d'] != 1 && $kpi[0]['q4_goal'] > 0) {
    $value_q4_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_d_value_q4',
        'header'=>'<span class="badge">D</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(4, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'D Value:'.$kpi[0]['d_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['e_desc'] != "" && $kpi[0]['fixed_e'] != 1 && $kpi[0]['q4_goal'] > 0) {
    $value_q4_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_e_value_q4',
        'header'=>'<span class="badge">E</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(4, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'E Value:'.$kpi[0]['e_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

if ($kpi[0]['f_desc'] != "" && $kpi[0]['fixed_f'] != 1 && $kpi[0]['q4_goal'] > 0) {
    $value_q4_count++;
    array_push($columns, [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'kpi_f_value_q4',
        'header'=>'<span class="badge">F</span>',
        'readonly'=>function($model, $key, $index, $widget) use ($kpi) {
            return is_editable_term(4, $kpi[0]['kpi_year']);
        },
        'editableOptions'=>[
            'header'=>'F Value:'.$kpi[0]['f_desc'],
            'options'=>[
                'pluginOptions'=>['min'=>0, 'max'=>50000]
            ]
        ],
        'hAlign'=>'right', 'vAlign'=>'middle', 'format'=>['decimal', 2], 'pageSummary'=>true
    ]);
}

array_push($columns,
    [
        'format'=>'html',
        'label' => 'Files', 'hAlign' => 'center', 'vAlign' => 'middle',
        'value' => function ($model, $key, $index, $widget) {
            return $model['attach_files'] && $model['attach_files'] != 'null' ? '<i class="fa fa-file-text"></i>' : '';

        }
    ]
);

array_push($columns,
    [
        'format'=>'html',
        'label' => 'Quick Win Q1', 'hAlign' => 'center', 'vAlign' => 'middle',
        'value' => function ($model, $key, $index, $widget)  {
            return $model['qwin_q1'] && $model['qwin_q1'] != 'null' ? '<i class="fa fa-file-text"></i>' : '';

        }
    ]
);

array_push($columns,
    [
        'format'=>'html',
        'label' => 'Quick Win Q2', 'hAlign' => 'center', 'vAlign' => 'middle',
        'value' => function ($model, $key, $index, $widget) {
            return $model['qwin_q2'] && $model['qwin_q2'] != 'null' ? '<i class="fa fa-file-text"></i>' : '';

        }
    ]
);

array_push($columns,
    [
        'format'=>'html',
        'label' => 'Quick Win Q3', 'hAlign' => 'center', 'vAlign' => 'middle',
        'value' => function ($model, $key, $index, $widget)  {
            return $model['qwin_q3'] && $model['qwin_q3'] != 'null' ? '<i class="fa fa-file-text"></i>' : '';

        }
    ]
);

array_push($columns,
    [
        'format'=>'html',
        'label' => 'Quick Win Q4', 'hAlign' => 'center', 'vAlign' => 'middle',
        'value' => function ($model, $key, $index, $widget)  {
            return $model['qwin_q4'] && $model['qwin_q4'] != 'null' ? '<i class="fa fa-file-text"></i>' : '';

        }
    ]
);

array_push($columns,
    [
        'format'=>'html',
        'label' => 'Edit Files', 'hAlign' => 'center', 'vAlign' => 'middle',
        'value' => function ($model, $key, $index, $widget)  {
            return Html::a( '<i class="fa fa-upload"></i>', ['kpi-sum/update', 'id' => $model['id']]);

        }
    ]
);


    array_push($columns,         [
        'attribute'=>'last_update',

        'noWrap' => true
    ]);

    ?>

<?php
    $q_column = [
        ['content' => '', 'options' => ['colspan' => 2,]],

    ];

if ($fixed_count > 0) {
    array_push($q_column,
        ['content' => '', 'options' => ['colspan' => $fixed_count,]]
    );
}



if ($kpi[0]['q1_goal'] > 0) {
    array_push($q_column,
        ['content' => 'ไตรมาส 1', 'options' => ['colspan' => $value_q1_count , 'class' => 'text-center']]
    );
}

if ($kpi[0]['q2_goal'] > 0) {
    array_push($q_column,
        ['content' => 'ไตรมาส 2', 'options' => ['colspan' => $value_q2_count , 'class' => 'text-center']]
    );
}

if ($kpi[0]['q3_goal'] > 0) {
    array_push($q_column,
        ['content' => 'ไตรมาส 3', 'options' => ['colspan' => $value_q3_count , 'class' => 'text-center']]
    );
}

if ($kpi[0]['q4_goal'] > 0) {
    array_push($q_column,
        ['content' => 'ไตรมาส 4', 'options' => ['colspan' => $value_q4_count , 'class' => 'text-center']]
    );
}

array_push(
    $q_column,
    ['content' => 'Attached files', 'options' => ['colspan' => 6, 'class' => 'text-center']]
);



array_push($q_column,
    ['content' => '']
);
?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
    'beforeHeader' => [
        [
            'columns' => $q_column,
            'options' => ['class' => 'skip-export'] // remove this row from export
        ]
    ],


        //'filterModel' => $searchModel,
        'pjax'=>true,
    'hover' => true,
    'responsive' => false,
    'containerOptions' => ['style' => 'overflow: auto', 'class' => 'panel-inverse'],
    //'condensed' => true,
    'responsiveWrap' => false,
        'columns' => $columns,
    ]); ?>


        </div>
    </div>

    <a href="<?=Url::toRoute(['kpi/index', 'id'=>$kpi[0]['id']])?>" class="btn btn-default pull-right" role="button">กลับไปยังรายงาน KPI >></a>

</div>
