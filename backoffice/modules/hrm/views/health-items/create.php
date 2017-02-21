<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HealthItems */

$this->title = 'Create Health Items';
$this->params['breadcrumbs'][] = ['label' => 'Health Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="health-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
