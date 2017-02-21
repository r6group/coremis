<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ScriptDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="script-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=Html::activeHiddenInput($model, 'parent_id')?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'table_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'table_create_command')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'script')->textarea(['rows' => 16]) ?>

    <?= $form->field($model, 'script_cron')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'force_script_cron')->checkbox(array('label'=>'Force Script Cron'))->label(''); ?>

    <?= $form->field($model, 'client_office_type')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'active')->checkbox(array('label'=>'Active'))->label(''); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
