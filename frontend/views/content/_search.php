<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\saraban\models\DocSearch */
/* @var $form yii\widgets\ActiveForm */
?>



    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="input-group input-group-lg">


        <?= $form->field($model, 'subject')
            ->textInput(
                ['template' => '{input}'
                    , 'class'=>'form-control'
                ,'placeholder'=>'ค้นหาบทความ...']
            )->label(false) ?>

    <span class="input-group-btn">
        <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
    </span>
    </div>

    <?php ActiveForm::end(); ?>



