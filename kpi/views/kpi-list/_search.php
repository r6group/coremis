<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model kpi\models\KpiListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kpi_year') ?>

    <?= $form->field($model, 'kpi_level') ?>

    <?= $form->field($model, 'kpi_no') ?>

    <?= $form->field($model, 'kpi_order') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'kpi_unit') ?>

    <?php // echo $form->field($model, 'target') ?>

    <?php // echo $form->field($model, 'pop_target') ?>

    <?php // echo $form->field($model, 'goal') ?>

    <?php // echo $form->field($model, 'max_value') ?>

    <?php // echo $form->field($model, 'method') ?>

    <?php // echo $form->field($model, 'data_source') ?>

    <?php // echo $form->field($model, 'a_unit') ?>

    <?php // echo $form->field($model, 'a_desc') ?>

    <?php // echo $form->field($model, 'b_unit') ?>

    <?php // echo $form->field($model, 'b_desc') ?>

    <?php // echo $form->field($model, 'operator') ?>

    <?php // echo $form->field($model, 'level_ministry')->checkbox() ?>

    <?php // echo $form->field($model, 'level_region')->checkbox() ?>

    <?php // echo $form->field($model, 'level_province')->checkbox() ?>

    <?php // echo $form->field($model, 'level_impotant')->checkbox() ?>

    <?php // echo $form->field($model, 'level_ceo_assess')->checkbox() ?>

    <?php // echo $form->field($model, 'tags') ?>

    <?php // echo $form->field($model, 'eval_freq') ?>

    <?php // echo $form->field($model, 'baseline') ?>

    <?php // echo $form->field($model, 'eval_rule') ?>

    <?php // echo $form->field($model, 'eval_method') ?>

    <?php // echo $form->field($model, 'doc') ?>

    <?php // echo $form->field($model, 'tech_support') ?>

    <?php // echo $form->field($model, 'director') ?>

    <?php // echo $form->field($model, 'reporter') ?>

    <?php // echo $form->field($model, 'areabase_kpi_provcode') ?>

    <?php // echo $form->field($model, 'areabase_kpi_regioncode') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
