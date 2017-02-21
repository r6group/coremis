<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model kpi\models\HdcSTable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hdc-stable-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'table_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpi_id')->textInput() ?>

    <?= $form->field($model, 'sql')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hdc_url')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
