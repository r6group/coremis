<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model kpi\models\KpiGroup */

$this->title = 'Create Kpi Dashboard';
$this->params['breadcrumbs'][] = ['label' => 'Kpi Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
