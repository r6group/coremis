<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\JsExpression;
use kartik\widgets\Select2;
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
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \kpi\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username', ['template' => "<div class=\"form-group mb15\">\n{input}\n{hint}\n{error}</div>"])->textInput(array('placeholder' => 'Username (เลขประจำตัวประชาชน)')) ?>
            <?= $form->field($model, 'password', ['template' => "<div class=\"form-group mb15\">\n{input}\n{hint}\n{error}</div>"])->passwordInput(array('placeholder' => 'กำหนด Password')) ?>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb15">
                    <?= $form->field($model, 'name', ['template' => "<div class=\"form-group\">\n{input}\n{hint}\n{error}</div>"])->textInput(array('placeholder' => 'ชื่อ')) ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb15">
                    <?= $form->field($model, 'surname', ['template' => "<div class=\"form-group\">\n{input}\n{hint}\n{error}</div>"])->textInput(array('placeholder' => 'นามสกุล')) ?>
                </div>
            </div>

            <?= $form->field($model, 'main_pst')->widget(Select2::classname(), [
                'data' => \common\models\Profile::getPositionArray(),
                'theme' => Select2::THEME_KRAJEE,
                'options' => ['placeholder' => 'ระบุตำแหน่ง ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false) ?>

            <?= $form->field($model, 'off_id')->widget(Select2::classname(), [
                //'data' => [],
                'value' => $model->off_id,
                'initValueText' => $model->off_id. ' ' .CHospital::getHospitalName($model->off_id),
                'options' => ['placeholder' => 'ระบุหน่วยงาน ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'ajax' => [
                        'url' => \yii\helpers\Url::to(['setting/hospital-list']),
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
            ])->label(false) ?>

            <?= $form->field($model, 'email', ['template' => "<div class=\"form-group mb15\">\n{input}\n{hint}\n{error}</div>"])->textInput(array('placeholder' => 'Email')) ?>


            <div class="form-group mb20">
                <label class="ckbox">
                    <input type="checkbox" name="checkbox">
                    <span>ฉันยอมรับเงื่อนไข</span>
                </label>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Create Account', ['class' => 'btn btn-success btn-quirk btn-block', 'name' => 'signup-button']) ?>

            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
