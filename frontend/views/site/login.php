<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="featured-boxes">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="featured-box featured-box-primary align-left mt-xlg">
                            <div class="box-content">

                                <?php $form = ActiveForm::begin(['id' => 'login-form', 'action' => Url::toRoute('/site/login')]); ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">

                                                <?= $form->field($model, 'username', [])->textInput(array('placeholder' => 'Username','class' => "form-control input-lg")); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <a class="pull-right" href="<?=Url::toRoute(['/site/request-password-reset'])?>">(ลืม Password?)</a>

                                                <?= $form->field($model, 'password', [])->passwordInput(array('placeholder' => 'Password','class' => "form-control input-lg")); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
															<span class="remember-box checkbox">
																<?= $form->field($model, 'rememberMe')->checkbox(['class' => '']) ?>
															</span>
                                        </div>
                                        <div class="col-md-6">
                                            <?= Html::submitButton('Login', ['data-loading-text' => 'Loading...', 'class' => 'btn btn-primary pull-right mb-xl', 'name' => 'login-button']) ?>

                                        </div>
                                    </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
