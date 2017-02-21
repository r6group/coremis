<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ScriptDetails */

$this->title = 'Update Script Details: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Script Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="script-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-7">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>

</div>
