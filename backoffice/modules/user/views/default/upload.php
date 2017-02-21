<?php

use yii\helpers\Html;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Upload photos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel">

    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?>
            <small>Importa dati da file</small>
        </h3>
    </div>

    <div class="panel-body">


        <?php
        echo FileUploadUI::widget([
            'model' => $model,
            'attribute' => 'image',
            'url' => ['/cabinet/default/upload', 'id' => 'test'],
            'gallery' => false,
            'fieldOptions' => [
                'accept' => 'image/*'
            ],
            'clientOptions' => [
                'maxFileSize' => 2000000
            ]
        ]);

        ?>

    </div>

</div>