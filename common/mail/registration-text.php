<?php

/* @var $this yii\web\View */
/* @var $email frontend\models\SignupForm */
/* @var $password frontend\models\SignupForm */

?>
สวัสดี คุณ <?=$name?> <?=$surname?>,

ไปที่ URL ที่แจ้งด้านล่าง เพื่อยืนยันการลงทะเบียน

<?= Yii::$app->urlManager->createAbsoluteUrl(['site/confirm','id'=>$id,'key'=>$auth_key])?>
['site/confirm','id'=>$user->id,'key'=>$user->auth_key]

