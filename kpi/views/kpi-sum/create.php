<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model kpi\models\KpiSum */

$this->title = 'Create Kpi Sum';
$this->params['breadcrumbs'][] = ['label' => 'Kpi Sums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-sum-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
