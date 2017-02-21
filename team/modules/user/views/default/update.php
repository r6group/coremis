<?php

use team\modules\user\User;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$this->title = 'Update profile';
$this->params['breadcrumbs'][] = ['label' => 'Personal Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-9 box">
        <div class="panel panel-profile">
            <div class="panel-heading">
                <h3><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">

                <div class="user-update">

                    <?= $this->render('_form', ['profile' => $profile]) ?>

                </div>
            </div>



        </div>
    </div>
    <div class="col-md-3">
        <?= $this->render('//layouts/side-menu') ?>
    </div>
</div>



