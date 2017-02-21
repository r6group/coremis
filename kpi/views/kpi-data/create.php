<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model kpi\models\KpiData */

$this->title = 'Create Kpi Data';
$this->params['breadcrumbs'][] = ['label' => 'Kpi Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
