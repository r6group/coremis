<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\saraban\models\Doc */

$this->title = 'Update Doc: ' . ' ' . $model->subject;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subject, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
