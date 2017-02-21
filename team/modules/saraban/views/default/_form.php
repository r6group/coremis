<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\modules\saraban\models\Doc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doc-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'ref')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_no')->textInput() ?>

    <?= $form->field($model, 'doc_date')->widget(DateControl::classname(), ['type' => DateControl::FORMAT_DATE,]); ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'from')->textInput() ?>

    <?= $form->field($model, 'to')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'urgent')->textInput() ?>

    <?= $form->field($model, 'secret')->textInput() ?>

    <?= $form->field($model, 'doc_file')->widget(FileInput::classname(), [
        //'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'initialPreview'=>$model->initialPreview($model->doc_file,'doc_file','file'),
            'initialPreviewConfig'=>$model->initialPreview($model->doc_file,'doc_file','config'),
            'allowedFileExtensions'=>['pdf'],
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false
        ]
    ]); ?>

    <?= $form->field($model, 'attach_files[]')->widget(FileInput::classname(), [
        'options' => [
            //'accept' => 'image/*',
            'multiple' => true
        ],
        'pluginOptions' => [
            'initialPreview'=>$model->initialPreview($model->attach_files,'attach_files','file'),
            'initialPreviewConfig'=>$model->initialPreview($model->attach_files,'attach_files','config'),
            'allowedFileExtensions'=>['pdf','doc','docx','xls','xlsx'],
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false,
            'overwriteInitial'=>false
        ]
    ]); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
