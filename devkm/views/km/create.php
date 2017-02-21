<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KmItems */

$this->title = 'Create Km Items';
$this->params['breadcrumbs'][] = ['label' => 'Km Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="km-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
