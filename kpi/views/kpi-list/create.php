<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model kpi\models\KpiList */

$this->title = 'Create KPI';
$this->params['breadcrumbs'][] = ['label' => 'KPI(s)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-list-create">

    <h3><?= Html::encode($this->title) ?></h3>




    <?= ($parent_title == ''? '' : '<div class="alert alert-info"><i class="fa fa-info-circle"></i> <span> คุณกำลังสร้างตัวชี้วัดย่อยใน:</span><br><h3> <span>Parent KPI: '.$parent_title.'</span></h3></div>' )?>

    <?= $this->render('_form', [
        'model' => $model,
        'parent_id' => $parent_id,
        'parent_title' => $parent_title,
    ]) ?>

</div>
