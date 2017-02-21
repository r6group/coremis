<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\datecontrol\DateControl;
use dosamigos\ckeditor\CKEditor;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\saraban\models\Doc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-body">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">

        <div class="col-sm-12 col-md-12">


            <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->widget(CKEditor::className(), [
                'options' => ['rows' => 16],
                'preset' => 'basic'
            ]) ?>

                <?= $form->field($model, 'content_file[]')->widget(FileInput::classname(), [
                    'options' => [
                        //'accept' => 'image/*',
                        'multiple' => true,
                    ],
                    'pluginOptions' => [
                        'initialPreview' => $model->initialPreview($model->content_file, 'content_file', 'file'),
                        'initialPreviewConfig' => $model->initialPreview($model->content_file, 'content_file', 'config'),
                        'allowedFileExtensions' => ['jpg', 'png', 'gif', 'jpeg'],
                        'showPreview' => true,
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => false,
                        'overwriteInitial' => false,
                        'maxFileCount'=> 10,
                    ]
                ]); ?>

                <?= $form->field($model, 'attach_files[]')->widget(FileInput::classname(), [
                    'options' => [
                        //'accept' => 'image/*',
                        'multiple' => true
                    ],
                    'pluginOptions' => [
                        'initialPreview' => $model->initialPreview($model->attach_files, 'attach_files', 'icon'),
                        'initialPreviewConfig' => $model->initialPreview($model->attach_files, 'attach_files', 'config'),
                        'allowedFileExtensions' => ['pdf', 'content', 'contentx', 'xls', 'xlsx', 'zip', 'doc', 'docx', 'rar', 'jpg', 'png', 'gif', 'jpeg'],
                        'showPreview' => true,
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => false,
                        'overwriteInitial' => false,
                        'maxFileCount'=> 10,
                    ]
                ]); ?>







            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <?= $form->field($model, 'content_date')->widget(DateControl::classname(), [
                        'type' => DateControl::FORMAT_DATE,
                        //'displayFormat' => 'dd MM yyyy',
                        'options' => [
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'php:d F Y',
                                'language' => 'th-th'],

                        ],

                    ]
                    ); ?>

                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group field-content-cat_id">
                        <label class="control-label" for="content-cat_id">ประเภท</label>

                        <?= \kartik\tree\TreeViewInput::widget([
                            'model' => $model,
                            'attribute' => 'cat_id',
                            'value' => 'false', // preselected values
                            'query' => \app\models\Cat::find()->addOrderBy('root, lft'),
                            'headingOptions' => ['label' => 'Categories'],
                            'rootOptions' => ['label' => '<i class="fa fa-tree text-success"></i>'],
                            'fontAwesome' => true,
                            'asDropdown' => true,
                            'multiple' => false,
                            'options' => ['disabled' => false]
                        ]); ?>
                        <div class="help-block"></div>
                    </div>
                </div>

            </div>
        </div>



    </div>
    <?= $form->field($model, 'ref')->hiddenInput()->label(false); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>