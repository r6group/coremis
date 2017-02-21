<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model kpi\models\KpiSum */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-sum-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'note')->widget(CKEditor::className(), [
        'options' => ['rows' => 16],
        'preset' => 'custom',
        'clientOptions' => [
            'toolbar' => [
                [
                    'name' => 'row1',
                    'items' => [
                        'Source', '-',
                        'Bold', 'Italic', 'Underline', 'Strike', '-',
                        'Subscript', 'Superscript', 'RemoveFormat', '-',
                        'TextColor', 'BGColor', '-',
                        'NumberedList', 'BulletedList', '-',
                        'Outdent', 'Indent', '-', 'Blockquote', '-',
                        'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'list', 'indent', 'blocks', 'align', 'bidi', '-',
                        'Link', 'Unlink', 'Anchor', '-',
                        'ShowBlocks', 'Maximize',
                    ],
                ],
                [
                    'name' => 'row2',
                    'items' => [
                        'Image', 'Table', 'HorizontalRule', 'SpecialChar', 'Iframe', '-',
                        'NewPage', 'Print', 'Templates', '-',
                        'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-',
                        'Undo', 'Redo', '-',
                        'Find', 'SelectAll', 'Format', 'Font', 'FontSize',
                    ],
                ],
            ],
        ],
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
            'allowedFileExtensions' => ['pdf', 'content', 'contentx', 'xls', 'xlsx', 'csv', 'zip', 'doc', 'docx', 'rar', 'jpg', 'png', 'gif', 'jpeg', 'ppt', 'pptx'],
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false,
            'overwriteInitial' => false,
            'maxFileCount'=> 10,
        ]
    ]); ?>

    <?= $form->field($model, 'qwin_q1[]')->widget(FileInput::classname(), [
        'options' => [
            //'accept' => 'image/*',
            'multiple' => true
        ],
        'pluginOptions' => [
            'initialPreview' => $model->initialPreview($model->qwin_q1, 'qwin_q1', 'icon'),
            'initialPreviewConfig' => $model->initialPreview($model->qwin_q1, 'qwin_q1', 'config'),
            'allowedFileExtensions' => ['pdf', 'content', 'contentx', 'xls', 'xlsx', 'csv', 'zip', 'doc', 'docx', 'rar', 'jpg', 'png', 'gif', 'jpeg', 'ppt', 'pptx'],
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false,
            'overwriteInitial' => false,
            'maxFileCount'=> 10,
        ]
    ]); ?>

    <?= $form->field($model, 'qwin_q2[]')->widget(FileInput::classname(), [
        'options' => [
            //'accept' => 'image/*',
            'multiple' => true
        ],
        'pluginOptions' => [
            'initialPreview' => $model->initialPreview($model->qwin_q2, 'qwin_q2', 'icon'),
            'initialPreviewConfig' => $model->initialPreview($model->qwin_q2, 'qwin_q2', 'config'),
            'allowedFileExtensions' => ['pdf', 'content', 'contentx', 'xls', 'xlsx', 'csv', 'zip', 'doc', 'docx', 'rar', 'jpg', 'png', 'gif', 'jpeg', 'ppt', 'pptx'],
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false,
            'overwriteInitial' => false,
            'maxFileCount'=> 10,
        ]
    ]); ?>

    <?= $form->field($model, 'qwin_q3[]')->widget(FileInput::classname(), [
        'options' => [
            //'accept' => 'image/*',
            'multiple' => true
        ],
        'pluginOptions' => [
            'initialPreview' => $model->initialPreview($model->qwin_q3, 'qwin_q3', 'icon'),
            'initialPreviewConfig' => $model->initialPreview($model->qwin_q3, 'qwin_q3', 'config'),
            'allowedFileExtensions' => ['pdf', 'content', 'contentx', 'xls', 'xlsx', 'csv', 'zip', 'doc', 'docx', 'rar', 'jpg', 'png', 'gif', 'jpeg', 'ppt', 'pptx'],
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false,
            'overwriteInitial' => false,
            'maxFileCount'=> 10,
        ]
    ]); ?>

    <?= $form->field($model, 'qwin_q4[]')->widget(FileInput::classname(), [
        'options' => [
            //'accept' => 'image/*',
            'multiple' => true
        ],
        'pluginOptions' => [
            'initialPreview' => $model->initialPreview($model->qwin_q4, 'qwin_q4', 'icon'),
            'initialPreviewConfig' => $model->initialPreview($model->qwin_q4, 'attach_files', 'config'),
            'allowedFileExtensions' => ['pdf', 'content', 'contentx', 'xls', 'xlsx', 'csv', 'zip', 'doc', 'docx', 'rar', 'jpg', 'png', 'gif', 'jpeg', 'ppt', 'pptx'],
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false,
            'overwriteInitial' => false,
            'maxFileCount'=> 10,
        ]
    ]); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
