<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Profile $model
 */

$this->title = 'Create Profile';
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'district'=> [],
        'subdistrict' =>[]
    ]) ?>

</div>
