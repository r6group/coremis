<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kpi\models\s;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model kpi\models\KpiList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-list-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'kpi_year')->dropDownList(['2560' => '2560']); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'kpi_level')->hint('(วัดในระดับใด)')->dropDownList(['ประเทศ' => 'ระดับกระทรวง','สป.' => 'ระดับสำนักงานปลัดกระทรวง','กรม' => 'ระดับกรม', 'เขต' => 'ระดับเขต', 'จังหวัด' => 'ระดับจังหวัด', 'CUP' => 'ระดับ CUP', 'สสอ.' => 'ระดับ สสอ.', 'หน่วยบริการ' => 'ระดับหน่วยบริการ']); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'kpi_no')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'kpi_order')->textInput()->hint('(ลำดับการแสงผล)') ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
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

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'kpi_unit')->dropDownList(['ร้อยละ' => 'ร้อยละ', 'อัตราต่อพันประชากร' => 'อัตราต่อพันประชากร', 'อัตราต่อแสนประชากร' => 'อัตราต่อแสนประชากร', 'ระดับความสำเร็จ' => 'ระดับความสำเร็จ', 'บาท' => 'บาท', 'ขั้นตอน' => 'ขั้นตอน', 'จำนวน' => 'จำนวน', 'ลิตรของแอลกอฮอล์/คน/ปี' => 'ลิตรของแอลกอฮอล์/คน/ปี']); ?>
        </div>

        <div class="col-md-8">
            <?= $form->field($model, 'pop_target')->textInput() ?>
        </div>

    </div>


    <div class="row">

        <div class="col-md-7">
            <?= $form->field($model, 'a_desc')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'a_unit')->textInput(['maxlength' => 120]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'fixed_a')->checkbox(['label' => 'ค่า A คงที่']) ?>
        </div>

        <div class="col-md-7">
            <?= $form->field($model, 'b_desc')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'b_unit')->textInput(['maxlength' => 120]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'fixed_b')->checkbox(['label' => 'ค่า B คงที่']) ?>
        </div>

        <div class="col-md-7">
            <?= $form->field($model, 'c_desc')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'c_unit')->textInput(['maxlength' => 120]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'fixed_c')->checkbox(['label' => 'ค่า C คงที่']) ?>
        </div>

        <div class="col-md-7">
            <?= $form->field($model, 'd_desc')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'd_unit')->textInput(['maxlength' => 120]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'fixed_d')->checkbox(['label' => 'ค่า D คงที่']) ?>
        </div>

        <div class="col-md-7">
            <?= $form->field($model, 'e_desc')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'e_unit')->textInput(['maxlength' => 120]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'fixed_e')->checkbox(['label' => 'ค่า E คงที่']) ?>
        </div>

        <div class="col-md-7">
            <?= $form->field($model, 'f_desc')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'f_unit')->textInput(['maxlength' => 120]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'fixed_f')->checkbox(['label' => 'ค่า F คงที่']) ?>
        </div>
    </div>


        <?= $form->field($model, 'target')->textInput() ?>


    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'operator')->dropDownList(['=' => '=', '>' => '>', '<' => '<', '>=' => '>=', '<=' => '<=']); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'goal')->textInput() ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'max_value')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'q1_goal')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'q2_goal')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'q3_goal')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'q4_goal')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'formula')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'method')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'preset' => 'basic',
    ]) ?>

    <?= $form->field($model, 'data_source')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'preset' => 'basic',

    ]) ?>


    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'level_ministry')->checkbox() ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'level_region')->checkbox() ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'level_province')->checkbox() ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'level_impotant')->checkbox() ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'level_ceo_assess')->checkbox() ?>
        </div>
    </div>



    <?= $form->field($model, 'tags')->textInput(['class' => 'form-control']) ?>

    <?= $form->field($model, 'eval_freq')->textInput() ?>

    <?= $form->field($model, 'baseline')->widget(CKEditor::className(), [
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

    <?= $form->field($model, 'eval_rule')->widget(CKEditor::className(), [
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

    <?= $form->field($model, 'eval_method')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'preset' => 'basic',

    ]) ?>

    <?= $form->field($model, 'doc')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'preset' => 'basic',
    ]) ?>

    <?= $form->field($model, 'tech_support')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'preset' => 'basic',
    ]) ?>

    <?= $form->field($model, 'director')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'preset' => 'basic',
    ]) ?>

    <?= $form->field($model, 'reporter')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'preset' => 'basic',
    ]) ?>


    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'areabase_kpi_provcode')->textInput(['maxlength' => 2]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'areabase_kpi_regioncode')->textInput(['maxlength' => 2]) ?>
        </div>

    </div>






    <?= $form->field($model, 'remark')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
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

    <?= $form->field($model, 'hosp_visible')->checkboxList(s::getHostype()); ?>

        <?= $form->field($model, 'hosp_specifics')->textArea(['rows' => '10']) ?>

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
<input type="hidden" name="parent_id" value="<?=$parent_id?>">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
