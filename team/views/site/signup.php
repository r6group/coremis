<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \team\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
?>


<div class="sign-overlay"></div>
<div class="signpanel"></div>

<div class="signup">
    <div class="row">
        <div class="col-sm-5">
            <div class="panel">
                <div class="panel-heading" style="text-align: center">
                    <a href="<?= Yii::$app->homeUrl; ?>"><img
                            src="<?= Url::to('@web/themes/quirk/images/mipble_logo.png') ?>" style="max-width: 200px">
                    </a>
                    <h4 class="panel-title">สร้างบัญชีผู้ใช้!</h4>
                </div>
                <div class="panel-body">
                    <button class="btn btn-primary btn-quirk btn-fb btn-block">ลงทะเบียนด้วยบัญชี Facebook</button>
                    <div class="or">or</div>
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <?= $form->field($model, 'username', ['template' => "<div class=\"form-group mb15\">\n{input}\n{hint}\n{error}</div>"])->textInput(array('placeholder' => 'เลขประจำตัวประชาชน')) ?>
                    <?= $form->field($model, 'password', ['template' => "<div class=\"form-group mb15\">\n{input}\n{hint}\n{error}</div>"])->passwordInput(array('placeholder' => 'กำหนด Password')) ?>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb15">
                            <?= $form->field($model, 'name', ['template' => "<div class=\"form-group\">\n{input}\n{hint}\n{error}</div>"])->textInput(array('placeholder' => 'ชื่อ')) ?>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb15">
                            <?= $form->field($model, 'surname', ['template' => "<div class=\"form-group\">\n{input}\n{hint}\n{error}</div>"])->textInput(array('placeholder' => 'นามสกุล')) ?>
                        </div>
                    </div>
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
                <!-- panel-body -->
            </div>
            <!-- panel -->
        </div>
        <!-- col-sm-5 -->
        <div class="col-sm-7">
            <div class="sign-sidebar">
                <h3 class="signtitle mb20">Two Good Reasons to Love Quirk</h3>

                <p>When it comes to websites or apps, one of the first impression you consider is the design. It needs
                    to be high quality enough otherwise you will lose potential users due to bad design.</p>

                <p>Below are some of the reasons why you love Quirk.</p>

                <br>

                <h4 class="reason">1. Attractive</h4>

                <p>When your website or app is attractive to use, your users will not simply be using it, they’ll look
                    forward to using it. This means that you should fashion the look and feel of your interface for your
                    users.</p>

                <br>

                <h4 class="reason">2. Responsive</h4>

                <p>Responsive Web design is the approach that suggests that design and development should respond to the
                    user’s behavior and environment based on screen size, platform and orientation. This would eliminate
                    the need for a different design and development phase for each new gadget on the market.</p>

                <hr class="invisible">

                <div class="form-group">
                    <a href="<?= Url::toRoute('site/login'); ?>"
                       class="btn btn-default btn-quirk btn-stroke btn-stroke-thin btn-block btn-sign">เป็นสมาชิกอยู่แล้ว?
                        ลงชื่อเข้าใช้ที่นี่!</a>
                </div>
            </div>
            <!-- sign-sidebar -->
        </div>
    </div>
</div><!-- signup -->

