<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KpiDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'hoscode') ?>

    <?= $form->field($model, 'kpi_year') ?>

    <?= $form->field($model, 'kpi_id') ?>

    <?= $form->field($model, 'kpi_a_value') ?>

    <?= $form->field($model, 'kpi_b_value') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <?php // echo $form->field($model, 'provcode') ?>

    <?php // echo $form->field($model, 'distcode') ?>

    <?php // echo $form->field($model, 'subdistcode') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
