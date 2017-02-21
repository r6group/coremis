<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model kpi\models\KpiSum */

$hospname = common\models\CHospital::getHospitalName($model->hospcode);
$kpi_model = kpi\models\KpiList::findOne(['id' => $model->kpi_id]);
$this->title = 'หน่วยงาน: ' . ' ' .  $hospname;
$this->title = $hospname;
$this->params['breadcrumbs'][] = ['label' => $kpi_model->title.' (ปีงบประมาณ '.$kpi_model->kpi_year.')' , 'url' => ['/kpi/index', 'id' => $model->kpi_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-sum-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'kpi_provcode',
//            'kpi_year',
//            'kpi_id',
//            'kpi_order',
            'note:html',
            'last_update',
            [
                'format'=>'html',
                'label' => 'ภาพกิจกรรม',
                'value' => $model->listImagesMasonry()
            ],
            [
                'format'=>'html',
                'label' => 'Attached Files',
                'value' => $model->listDownloadFiles('attach_files')
            ],
            [
                'format'=>'html',
                'label' => 'รายงาน Quick Win ไตรมาส 1',
                'value' => $model->listDownloadFiles('qwin_q1')
            ],
            [
                'format'=>'html',
                'label' => 'รายงาน Quick Win ไตรมาส 2',
                'value' => $model->listDownloadFiles('qwin_q2')
            ],
            [
                'format'=>'html',
                'label' => 'รายงาน Quick Win ไตรมาส 3',
                'value' => $model->listDownloadFiles('qwin_q3')
            ],
            [
                'format'=>'html',
                'label' => 'รายงาน Quick Win ไตรมาส 4',
                'value' => $model->listDownloadFiles('qwin_q4')
            ],
        ],
    ]) ?>

</div>
