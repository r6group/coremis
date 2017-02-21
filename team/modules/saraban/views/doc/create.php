<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\saraban\models\Doc */

$this->title = 'ส่งหนังสือ';
$this->params['breadcrumbs'][] = ['label' => 'สารบรรณออกนไลน์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>



</div>
