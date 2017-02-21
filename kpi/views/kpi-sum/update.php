<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model kpi\models\KpiSum */
$hospname = common\models\CHospital::getHospitalName($model->hospcode);
$kpi_model = kpi\models\KpiList::findOne(['id' => $model->kpi_id]);
$this->title = 'หน่วยงาน: ' . ' ' .  $hospname;
$this->params['breadcrumbs'][] = ['label' => $kpi_model->title.' (ปีงบประมาณ '.$kpi_model->kpi_year.')' , 'url' => ['/kpi/index', 'id' => $model->kpi_id]];
$this->params['breadcrumbs'][] = ['label' => $hospname , 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'รายงานผล';
?>
<div class="kpi-sum-update">

    <h1>รายงานผลการปฏิบัติราชการ</h1>
    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
