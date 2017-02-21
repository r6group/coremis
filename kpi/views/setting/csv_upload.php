<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CsvImport */
/* @var $form ActiveForm */

Yii::$app->view->registerCssFile('http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/styles/default.min.css', ['position' => yii\web\View::POS_HEAD]);
Yii::$app->view->registerJsFile('http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js', ['position' => yii\web\View::POS_HEAD]);


?>
<div class="main">
    <div class="container">
        <h1>CSV Upload</h1>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

                <?= $form->field($model, 'userfile')->fileInput() ?>
                <?= $form->field($model, 'use_csv_header')->checkbox(); ?>
                <?= $form->field($model, 'field_separate_char') ?>
                <?= $form->field($model, 'field_enclose_char') ?>
                <?= $form->field($model, 'field_escape_char') ?>
                <?= $form->field($model, 'encoding') ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>

                <br><br>
                <?php if ($model->error != "") {
                    echo $model->error;
                    echo "<br><br>" . $model->sql_str;
                }
                ?>
            </div>
            <div class="col-lg-7">

                <div>

                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-square"></i> วิธี Upload
                            ข้อมูลไปยังศูนย์ข้อมูลผลการดำเนินงานรายตัวชี้วัด สนย.</h3>
                    </div>
                    <div class="panel-body">
                        <div class="bs-example">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1.
                                                รูปแบบไฟล์ (csv, zip)</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <p>
                                                ไฟล์ที่สามารถนำเข้า Database Server ของ สนย. เป็นไฟล์ .csv แต่สามารถ Zip
                                                ไฟล์ csv หลายๆ ไฟล์เป็นไฟล์ Zip และ Upload ไฟล์ Zip ขึ้นมาก็ได้เช่นกัน

                                            </p>


                                            <ul>
                                                <li>ไฟล์ csv ต้องมี Column Header ติดมาด้วย เพื่อความถูกต้องในการนำเข้า
                                                    Database Server
                                                </li>
                                                <li>อัคระขั้นระหว่าง Field <b>(Separate Character)</b> ใช้ ,</li>
                                                <li>อัคระครอบ Field <b>(Enclose Character)</b> ไม่ต้องระบุ</li>
                                                <li>อัคระคั่นอัคระพิเศษ <b>(Escape Character)</b> ไม่ต้องระบุ</li>
                                                <li><b>Encoding</b> ใช้ utf8</li>

                                            </ul>


                                            <p>หาก Export ข้อมูลด้วย Navicat เกณฑ์เหล่านี้เป็น Default
                                                ของโปรแกรมอยู่แล้ว ยกเว้น Column Header ที่ Default ของ Navicat จะไม่แนบ
                                                Column Header มาด้วย ต้อง Checked ในหน้าต่าง Export ของ Navicat ด้วย

                                                แต่หากใช้รูปแบบที่แตกต่างจากที่กำหนด สามารถระบุรูปแบบได้เองในฟอร์ม CSV
                                                Upload ที่เตรียมไว้ให้นี้</p>


                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2.
                                                การตั้งชื่อไฟล์?</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>
                                                การตั้งชื่อไฟล์ csv ให้ตั้งชื่อตามที่กำหนด
                                                (ชื่อไฟล์จะกำหนดไว้ในรายละเอียด SQL Script ด้านล่าง) ส่วนการตั้งชื่อไฟล์
                                                Zip (กรณี zip ไฟล์ก่อนส่ง) สามารถตั้งชื่อได้อย่างอิสระ
                                                เนื่องจาก Server จะคลาย Zip และอ้างอิงชื่อจากไฟล์ csv ด้านใน
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">

                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">3.
                                                วิธีส่งข้อมูลผ่าน RESTful API</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>
                                                Comming Soon.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--                SQL Script-->

                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-square"></i> Data Structure</h3>
                    </div>
                    <div class="panel-body">
                        <div class="bs-example">
                            <div class="panel-group" id="accordion2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#sql1">
                                                SQL สำหรับสร้าง Data Structure เพื่อการ Export ข้อมูล
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="sql1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    ชื่อไฟล์ csv :
                                                    <mark><b>kpi_sum.csv</b></mark>
                                                </div>
                                            </div>
                                            <br>
                                            <pre><code class="sql">
CREATE TABLE `kpi_sum` (
    `hospcode` varchar(5) NOT NULL,
    `kpi_year` varchar(4) NOT NULL,
    `kpi_no` varchar(5) NOT NULL,
    `kpi_provcode` varchar(2) NOT NULL,
    `kpi_fixed_a_value` decimal(10,2) DEFAULT NULL,
    `kpi_fixed_b_value` decimal(10,2) DEFAULT NULL,
    `kpi_fixed_c_value` decimal(10,2) DEFAULT NULL,
    `kpi_fixed_d_value` decimal(10,2) DEFAULT NULL,
    `kpi_fixed_e_value` decimal(10,2) DEFAULT NULL,
    `kpi_fixed_f_value` decimal(10,2) DEFAULT NULL,
    `kpi_a_value_q1` decimal(10,2) DEFAULT NULL,
    `kpi_b_value_q1` decimal(10,2) DEFAULT NULL,
    `kpi_c_value_q1` decimal(10,2) DEFAULT NULL,
    `kpi_d_value_q1` decimal(10,2) DEFAULT NULL,
    `kpi_e_value_q1` decimal(10,2) DEFAULT NULL,
    `kpi_f_value_q1` decimal(10,2) DEFAULT NULL,
    `kpi_a_value_q2` decimal(10,2) DEFAULT NULL,
    `kpi_b_value_q2` decimal(10,2) DEFAULT NULL,
    `kpi_c_value_q2` decimal(10,2) DEFAULT NULL,
    `kpi_d_value_q2` decimal(10,2) DEFAULT NULL,
    `kpi_e_value_q2` decimal(10,2) DEFAULT NULL,
    `kpi_f_value_q2` decimal(10,2) DEFAULT NULL,
    `kpi_a_value_q3` decimal(10,2) DEFAULT NULL,
    `kpi_b_value_q3` decimal(10,2) DEFAULT NULL,
    `kpi_c_value_q3` decimal(10,2) DEFAULT NULL,
    `kpi_d_value_q3` decimal(10,2) DEFAULT NULL,
    `kpi_e_value_q3` decimal(10,2) DEFAULT NULL,
    `kpi_f_value_q3` decimal(10,2) DEFAULT NULL,
    `kpi_a_value_q4` decimal(10,2) DEFAULT NULL,
    `kpi_b_value_q4` decimal(10,2) DEFAULT NULL,
    `kpi_c_value_q4` decimal(10,2) DEFAULT NULL,
    `kpi_d_value_q4` decimal(10,2) DEFAULT NULL,
    `kpi_e_value_q4` decimal(10,2) DEFAULT NULL,
    `kpi_f_value_q4` decimal(10,2) DEFAULT NULL,
    PRIMARY KEY (`hospcode`, `kpi_year`, `kpi_no`)
    ) ENGINE=`MyISAM` DEFAULT CHARACTER SET utf8
    COLLATE utf8_general_ci ROW_FORMAT=DYNAMIC
    COMMENT='' CHECKSUM=0 DELAY_KEY_WRITE=0;
                                                </code></pre>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script>hljs.initHighlightingOnLoad();</script>


