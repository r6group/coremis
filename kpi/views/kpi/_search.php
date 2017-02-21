<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use common\models\Profile;



/* @var $this yii\web\View */
/* @var $model app\models\s */
/* @var $form yii\widgets\ActiveForm */

Yii::$app->view->registerJsFile(Url::to('@web/js/activeresponse.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->registerJs("


    var AddressGroup = $('#address');
    var HospList = $('#hosp-list');
    var CupList = $('#cup-list');
    var District = $('#district');
    var Subdistrict = $('#subdistrict');
    var Region = $('#region');


    function setVisibleInput(scope, speed) {
        
        switch(scope) {
        case '1':
            AddressGroup.hide(speed);
            HospList.hide(speed);
            District.hide(speed);
            Subdistrict.hide(speed);
            CupList.hide(speed);
            Region.show(speed);
            break;
        case '2':
            Region.hide(speed);
            HospList.hide(speed);
            District.hide(speed);
            Subdistrict.hide(speed);
            CupList.hide(speed);
            AddressGroup.show(speed);
            break;
        case '3':
            Region.hide(speed);
            HospList.hide(speed);
            Subdistrict.hide(speed);
            CupList.hide(speed);
            AddressGroup.show(speed);
            District.show(speed);
            break;
        case '4':
            Region.hide(speed);
            HospList.hide(speed);
            CupList.hide(speed);
            AddressGroup.show(speed);
            District.show(speed);
            Subdistrict.show(speed);

            break;
        case '5':
            Region.hide(speed);
            District.hide(speed);
            Subdistrict.hide(speed);
            HospList.hide(speed);
            AddressGroup.show(speed);
            CupList.show(speed);
            break;
        case '6':
            Region.hide(speed);
            Subdistrict.hide(speed);
            CupList.hide(speed);
            AddressGroup.show(speed);
            District.show(speed);
            HospList.show(speed);
            break;
        default:
            Region.hide(speed);
            AddressGroup.hide(speed);
            CupList.hide(speed);
            HospList.hide(speed);
            District.hide(speed);
            Subdistrict.hide(speed);
        }
    }



    setVisibleInput('" . $model->scope . "', 0);


", yii\web\View::POS_END, 'setVisibleInput');


$this->registerJs("


    $('#s-province').on('select2:unselecting', function (e) {
        $(this).select2('val', '');
        e.preventDefault();
    });

    $('#s-district').on('select2:unselecting', function (e) {
        $(this).select2('val', '');
        e.preventDefault();
    });

    $('#s-subdistrict').on('select2:unselecting', function (e) {
        $(this).select2('val', '');
        e.preventDefault();
    });

    $('#s-timescope').on('select2:unselecting', function (e) {
        $(this).select2('val', '');
        e.preventDefault();
    });

    $('#s-cup').on('select2:unselecting', function (e) {
        $(this).select2('val', '');
        e.preventDefault();
    });

    $('#s-hospcode').on('select2:unselecting', function (e) {
        $(this).select2('val', '');
        e.preventDefault();
    });

    $('#s-region').on('select2:unselecting', function (e) {
        $(this).select2('val', '');
        e.preventDefault();
    });


    setVisibleInput('" . $model->scope . "', 0);



", yii\web\View::POS_LOAD, 'pSelect2');


$kpi_path = Yii::$app->config->get('KPI.PATH');

?>

<div class="panel panel-inverse collapse" aria-expanded="false" id="collapseExample" style="margin: -10px 15px 15px 15px;border: 1px solid silver;">


        <div class="panel-body">

            <div class="row">

                    <div class="col-md-12">
                        <?= $form->field($model, 'scope')->widget(Select2::classname(), [
                            'name' => 'scope',
                            'hideSearch' => true,
                            'data' => $model->getAreaScope(),
                            'options' => [
                                'onchange' => 'setVisibleInput(this.value, 500)',
                                'placeholder' => 'กำหนดขอบเขตข้อมูลที่จะแสดง...',
                            ],
                            'pluginOptions' => [
                                'allowClear' => false
                            ],
                        ]); ?>
                    </div>

                    <div class="col-md-12" id="region">
                        <?= $form->field($model, 'region')->widget(Select2::classname(), [
                            'name' => 'region',
                            'hideSearch' => true,
                            'data' => $model->getRegion(),
                            'options' => ['placeholder' => 'ทุกเขตสุขภาพ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>
                    </div>

                    <div class="col-md-12" id="address">
                        <?= $form->field($model, 'province')->widget(Select2::classname(), [
                            'name' => 'province',
                            'hideSearch' => false,
                            'data' => $model->getProvince(),
                            'options' => ['onchange' => 'callAR("'.$kpi_path.'kpi/update-district/", "prov="+this.value);', 'placeholder' => 'ทุกจังหวัด...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>
                    </div>

                    <div class="col-md-12" id="district">
                        <?= $form->field($model, 'district')->widget(Select2::classname(), [
                            'name' => 'district',
                            'hideSearch' => false,
                            'data' => $district,
                            'options' => ['onchange' => 'callAR("'.$kpi_path.'kpi/update-subdistrict/", "prov="+$("#s-province").val()+"&district="+this.value);', 'placeholder' => 'ทุกอำเภอ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>
                    </div>

                    <div class="col-md-12" id="subdistrict">
                        <?= $form->field($model, 'subdistrict')->widget(Select2::classname(), [
                            'name' => 'subdistrict',
                            'hideSearch' => false,
                            'data' => $subdistrict,
                            'options' => ['placeholder' => 'ทุกตำบล...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>
                    </div>


                    <div class="col-md-12" id="hosp-list">
                        <?= $form->field($model, 'hospcode')->widget(Select2::classname(), [
                            'data' => Profile::getHosArray($model->province, empty($model->district) ? '': substr($model->district, 2, 2)),
                            'theme' => Select2::THEME_KRAJEE,
                            'hideSearch' => false,
                            'options' => ['placeholder' => 'ทุกสถานพยาบาล...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]) ?>
                    </div>

                    <div class="col-md-12" id="cup-list">
                        <?= $form->field($model, 'cup')->widget(Select2::classname(), [
                            'data' => Profile::getCupArray($model->province),
                            'theme' => Select2::THEME_KRAJEE,
                            'hideSearch' => false,
                            'options' => ['placeholder' => 'ทุก CUP...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]) ?>
                    </div>


                <div class="col-md-12">
                    <label class="control-label"> </label>

                    <div class="form-group">
                        <?= Html::submitButton('ดำเนินการ', ['class' => 'btn btn-primary btn-block btn-lg']) ?>
                    </div>
                    <?= $form->field($model, 'reports')->hiddenInput(['label' => '', 'value' => $model->repid])->label(false) ?>
                </div>

            </div>

            <input type="hidden" name="id" value="<?= Yii::$app->getRequest()->getQueryParam('id'); ?>">
            <input type="hidden" name="embeded" value="<?= Yii::$app->getRequest()->getQueryParam('embeded'); ?>">
            <input type="hidden" name="title" value="<?= Yii::$app->getRequest()->getQueryParam('title'); ?>">
            <input type="hidden" name="gis" value="<?= Yii::$app->getRequest()->getQueryParam('gis'); ?>">
            <input type="hidden" name="gauge" value="<?= Yii::$app->getRequest()->getQueryParam('gauge'); ?>">

            <input type="hidden" name="chart" value="<?= Yii::$app->getRequest()->getQueryParam('chart'); ?>">
            <input type="hidden" name="table" value="<?= Yii::$app->getRequest()->getQueryParam('table'); ?>">
            <input type="hidden" name="desc" value="<?= Yii::$app->getRequest()->getQueryParam('desc'); ?>">
            <input type="hidden" name="comment" value="<?= Yii::$app->getRequest()->getQueryParam('comment'); ?>">
            <input type="hidden" name="lv" value="<?= Yii::$app->getRequest()->getQueryParam('lv'); ?>">
            <input type="hidden" name="z" value="<?= Yii::$app->getRequest()->getQueryParam('z'); ?>">

            <input type="hidden" name="lock_locate" value="1">

        </div>


    </div>
