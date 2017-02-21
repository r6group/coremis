<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\hrm\models\ProfileSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'stf_id') ?>

    <?= $form->field($model, 'off_id') ?>

    <?= $form->field($model, 'off_id18') ?>

    <?= $form->field($model, 'cid') ?>

    <?php // echo $form->field($model, 'pname') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'surname') ?>

    <?php // echo $form->field($model, 'middle_name') ?>

    <?php // echo $form->field($model, 'photo_path') ?>

    <?php // echo $form->field($model, 'stf_type') ?>

    <?php // echo $form->field($model, 'main_pst') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'plevel') ?>

    <?php // echo $form->field($model, 'dr_special') ?>

    <?php // echo $form->field($model, 'licence_no') ?>

    <?php // echo $form->field($model, 'insig') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'avatar_url') ?>

    <?php // echo $form->field($model, 'balance') ?>

    <?php // echo $form->field($model, 'bonus_balance') ?>

    <?php // echo $form->field($model, 'user_affiliate_id') ?>

    <?php // echo $form->field($model, 'ctzshp') ?>

    <?php // echo $form->field($model, 'nthlty') ?>

    <?php // echo $form->field($model, 'religion') ?>

    <?php // echo $form->field($model, 'occptn') ?>

    <?php // echo $form->field($model, 'blood_group') ?>

    <?php // echo $form->field($model, 'addr_part') ?>

    <?php // echo $form->field($model, 'rd_part') ?>

    <?php // echo $form->field($model, 'moo_part') ?>

    <?php // echo $form->field($model, 'tmb_part') ?>

    <?php // echo $form->field($model, 'amp_part') ?>

    <?php // echo $form->field($model, 'chw_part') ?>

    <?php // echo $form->field($model, 'home_tel') ?>

    <?php // echo $form->field($model, 'mobile_tel') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'marry_status') ?>

    <?php // echo $form->field($model, 'sps_name') ?>

    <?php // echo $form->field($model, 'mth_name') ?>

    <?php // echo $form->field($model, 'fth_name') ?>

    <?php // echo $form->field($model, 'workgroup') ?>

    <?php // echo $form->field($model, 'Income') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Note') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'dept_id') ?>

    <?php // echo $form->field($model, 'dt_hired') ?>

    <?php // echo $form->field($model, 'dt_started') ?>

    <?php // echo $form->field($model, 'dt_term') ?>

    <?php // echo $form->field($model, 'work_phone') ?>

    <?php // echo $form->field($model, 'phone_ext') ?>

    <?php // echo $form->field($model, 'emer_contact') ?>

    <?php // echo $form->field($model, 'emer_phone') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
