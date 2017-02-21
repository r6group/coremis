<?php
use yii\helpers\Html;


$this->title = 'Reg Dump';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="km-items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= var_dump($users);?>
</div>
