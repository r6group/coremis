<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kpi\models\KpiList */

$this->title = 'Update Kpi List: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Kpi Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kpi-list-update">

    <h3><?=$model->kpi_no?> <?= Html::encode($this->title) ?></h3>
    <?= ($parent_title == ''? '' : '<div class="alert alert-info"><i class="fa fa-info-circle"></i> <span> คุณกำลังปรับปรุงตัวชี้วัดย่อยใน:</span><br><h3> <span>Parent KPI: '.$parent_title.'</span></h3></div>' )?>


    <?= $this->render('_form', [
        'model' => $model,
        'parent_id' => $model->parent_id,
    ]) ?>

</div>
