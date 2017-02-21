<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\datecontrol\DateControl;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\saraban\models\Doc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-body">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">

        <div class="col-sm-6 col-md-6">


            <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <?= $form->field($model, 'doc_date')->widget(DateControl::classname(), [
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
                    <?= $form->field($model, 'doc_no')->textInput() ?>
                </div>
            </div>


            <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

            <div class="form-group field-doc-from">
                <label class="control-label" for="doc-from">กลุ่มงาน/งาน/แผนก</label>

                <?= \kartik\tree\TreeViewInput::widget([
                    'model' => $model,
                    'attribute' => 'from',
                    'value' => 'false', // preselected values
                    'query' => \common\models\WorkGroup::find()->addOrderBy('root, lft'),
                    'headingOptions' => ['label' => 'Categories'],
                    'rootOptions' => ['label' => '<i class="fa fa-tree text-success"></i>'],
                    'fontAwesome' => true,
                    'asDropdown' => true,
                    'multiple' => false,
                    'options' => ['disabled' => false]
                ]); ?>
                <div class="help-block"></div>
            </div>


            <div class="form-group field-doc-to">
                <label class="control-label" for="doc-to">ถึง</label>

                <?= \kartik\tree\TreeViewInput::widget([
                    'model' => $model,
                    'attribute' => 'to',
                    'value' => 'false', // preselected values
                    'query' => \common\models\WorkGroup::find()->addOrderBy('root, lft'),
                    'headingOptions' => ['label' => 'Categories'],
                    'rootOptions' => ['label' => '<i class="fa fa-tree text-success"></i>'],
                    'fontAwesome' => true,
                    'asDropdown' => true,
                    'multiple' => true,
                    'options' => ['disabled' => false]
                ]); ?>
                <div class="help-block"></div>
            </div>


            <?= $form->field($model, 'urgent')->textInput() ?>

            <?= $form->field($model, 'secret')->textInput() ?>
        </div>
        <div class="col-sm-6 col-md-6">

            <?= $form->field($model, 'doc_file')->widget(FileInput::classname(), [
                //'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'initialPreview' => $model->initialPreview($model->doc_file, 'doc_file', 'file'),
                    'initialPreviewConfig' => $model->initialPreview($model->doc_file, 'doc_file', 'config'),
                    'allowedFileExtensions' => ['pdf'],
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
                    'initialPreview' => $model->initialPreview($model->attach_files, 'attach_files', 'file'),
                    'initialPreviewConfig' => $model->initialPreview($model->attach_files, 'attach_files', 'config'),
                    'allowedFileExtensions' => ['pdf', 'doc', 'docx', 'xls', 'xlsx'],
                    'showPreview' => true,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false,
                    'overwriteInitial' => false
                ]
            ]); ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

        </div>


    </div>
    <?= $form->field($model, 'ref')->hiddenInput()->label(false); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>