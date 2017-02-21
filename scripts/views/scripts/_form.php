<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Scripts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scripts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cat_id')->textInput() ?>

    <?= $form->field($model, 'master_cron')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'force_master_cron')->checkbox(array('label'=>'Force Master Cron'))->label(''); ?>

    <?= $form->field($model, 'public')->dropDownList(['0' => 'ส่วนตัว', '1' => 'สาธารณะ']); ?>

    <?= $form->field($model, 'master_active')->checkbox(array('label'=>'Master Active'))->label(''); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
