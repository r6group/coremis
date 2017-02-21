<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Assignment */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignment-index">

    <div class="box box-body">

        <?php
        Pjax::begin([
            'enablePushState' => false,
        ]);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'f_name',
                    'label' => 'ชื่อ',
                ],
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'l_name',
                    'label' => 'นามสกุล',
                ],
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'username',
                    'label' => 'Username',
                ],
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => $usernameField,
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}'
                ],
            ],
        ]);
        Pjax::end();
        ?>

    </div>
</div>
