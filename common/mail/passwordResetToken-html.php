<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>สวัสดี คุณ <?= Html::encode($user->f_name . ' ' . $user->l_name) ?>,</p>

    <p>คลิกที่ link ด้านล่างนี้เพื่อทำการ reset password ของคุณ:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
