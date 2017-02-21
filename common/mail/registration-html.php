<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $email frontend\models\SignupForm */
/* @var $password frontend\models\SignupForm */

?>
<div class="password-reset">
    <p>สวัสดี คุณ <?=$name?> <?=$surname?>,</p>


    <?=\yii\helpers\Html::a('คลิกที่นี่เพื่อยืนยันการลงทะเบียน', Yii::$app->urlManager->createAbsoluteUrl(['site/confirm','id'=>$id,'key'=>$auth_key]))?>



</div>
