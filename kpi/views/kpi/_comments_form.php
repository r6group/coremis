<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model kpi\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    if (Yii::$app->user->isGuest) {
        echo $form->field($model, 'user_name')->textInput(['maxlength' => true]);
    }

    ?>

    <?=$form->field($model, 'content_id')->hiddenInput()->label(false)?>

    <?= $form->field($model, 'comment')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'preset' => 'basic',
    ]) ?>

    <?php
    if (Yii::$app->user->isGuest) {
        echo $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',]);
    }

    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
