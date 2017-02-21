<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ScriptDetails */

$this->title = 'Create Script Details';
$this->params['breadcrumbs'][] = ['label' => 'Script Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="script-details-create">

    <h1>สร้างรายงาน</h1>
    <h2>ใน <?= $parent_title ?></h2>

    <div class="row">
        <div class="col-lg-7">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>

</div>
