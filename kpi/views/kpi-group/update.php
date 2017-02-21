<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kpi\models\KpiGroup */

$this->title = 'Update Kpi Dashboard: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Kpi Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kpi-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
