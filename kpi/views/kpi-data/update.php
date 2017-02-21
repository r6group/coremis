<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kpi\models\KpiData */

$this->title = 'Update Kpi Data: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kpi Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kpi-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
