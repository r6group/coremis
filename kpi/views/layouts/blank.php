<?php

/* @var $this \yii\web\View */
/* @var $content string */


use common\widgets\Alert;
use kpi\assets\AppAsset;
use yii\helpers\Html;
use yii\web\View;

AppAsset::register($this);

$this->registerJs("
  $('.loader').fadeOut('slow');
", View::POS_LOAD, 'my-load');

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="th-TH">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>

    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('https://raw.githubusercontent.com/riverbed/flyscript-portal/master/thirdparty/showLoading/images/loading.gif') 50% 50% no-repeat rgb(249,249,249);
        }
    </style>

</head>
<body style="background-color: #EEEEEE;padding: 0px 0px;">
<div class="loader"></div>

    <?= Alert::widget() ?>
    <?= $content ?>


<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>

