<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use common\models\Profile;
use yii\web\JsExpression;
use common\models\CHospital;

$formatJs = <<< 'JS'
var formatRepo = function (repo) {
    if (repo.loading) {
        return repo.text;
    }


    var markup =
'<div class="row">' +
    '<div class="col-sm-12">' +
        '<b style="margin-left:5px">' + repo.hoscode + ' ' + repo.hosname +
    '</div>' +
'</div>';

    return '<div style="overflow:hidden;">' + markup + '</div>';
};
var formatRepoSelection = function (repo) {
    if (repo.hoscode) {
        return repo.hoscode + " " + repo.hosname;
    } else {
        return repo.text;
    }

}
JS;

// Register the formatting script
$this->registerJs($formatJs, $this::POS_HEAD);

// script to parse the results into the format expected by Select2
$resultsJs = <<< JS
function (data, params) {
    params.page = params.page || 1;
    return {
        results: data.items,
        pagination: {
            more: (params.page * 30) < data.total_count
        }
    };
}
JS;


/* @var $this yii\web\View */
/* @var $model app\models\HealthItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="health-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'off_id')->widget(Select2::classname(), [
        //'data' => [],
        'value' => $model->off_id,
        'initValueText' => $model->off_id. ' ' .CHospital::getHospitalName($model->off_id),
        'options' => ['placeholder' => 'ระบุหน่วยงาน ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'ajax' => [
                'url' => \yii\helpers\Url::to(['default/hospital-list']),
                'dataType' => 'json',
                'delay' => 250,
                'data' => new JsExpression('function(params) { return {q:params.term, page: params.page}; }'),
                'processResults' => new JsExpression($resultsJs),
                'cache' => true
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('formatRepo'),
            'templateSelection' => new JsExpression('formatRepoSelection'),
        ],
    ]) ?>


    <?= $form->field($model, 'item_code')->widget(Select2::classname(), [
        'data' => ['001' => 'เครื่องเอ็กซเรย์คอมพิวเตอร์ (CT SCAN)', '002' => 'เครื่องตรวจอวัยวะด้วยสนามแม่เหล็กไฟฟ้า', '003' => 'เครื่องสลายนิ่ว', '004' => 'เครื่องแกมมา ไนฟ์ (Gamma Knife)', '005' => 'เครื่องอัลตราซาวด์', '006' => 'เครื่องล้างไต', '007' => 'รถพยาบาล (Ambulance)'],
        'theme' => Select2::THEME_KRAJEE,
        'hideSearch' => true,
        'options' => ['placeholder' => 'ระบุประเภทครุภัณฑ์ ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>



    <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
