<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model kpi\models\HdcSTable */

$this->title = 'Create HDC Webservice Caller';
$this->params['breadcrumbs'][] = ['label' => 'HDC Webservice Caller', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hdc-stable-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
