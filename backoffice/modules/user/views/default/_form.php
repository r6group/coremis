<?php

use vova07\fileapi\Widget;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use backoffice\modules\user\User;

/* @var $this yii\web\View */
/* @var $profile common\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php
    $form = ActiveForm::begin(
                    [
                        'id' => 'user-form', 
                    ]
    );
    ?>


    <div class="row">



        <div class="col-sm-4">
            <?=
            $form->field($profile, 'avatar_url')->widget(Widget::className(), [
                    'settings'         => [
                        'url' => ['fileapi-upload']
                    ],
                    'crop'             => true,
                    'cropResizeWidth'  => 400,
                    'cropResizeHeight' => 400
                ]
            )
            ?>
        </div>


    </div>
    <div class="row">
        <div class="col-sm-12">
            <?=
            Html::submitButton('Update', [
                'class' => 'btn btn-success btn-large'
                    ]
            )
            ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>

</div>
