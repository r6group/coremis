<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model kpi\models\KpiSumSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-sum-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kpi_provcode') ?>

    <?= $form->field($model, 'kpi_year') ?>

    <?= $form->field($model, 'kpi_id') ?>

    <?= $form->field($model, 'kpi_order') ?>

    <?php // echo $form->field($model, 'kpi_definition') ?>

    <?php // echo $form->field($model, 'kpi_a_value') ?>

    <?php // echo $form->field($model, 'kpi_b_value') ?>

    <?php // echo $form->field($model, 'kpi_result') ?>

    <?php // echo $form->field($model, 'kpi_condition') ?>

    <?php // echo $form->field($model, 'kpi_formula') ?>

    <?php // echo $form->field($model, 'kpi_sql') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
