<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kpi Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('สร้าง KPI Dashboard', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'format'=>'html',
                'label' => 'Dashboard',
                'value' => function ($model, $key, $index, $widget) {
                    return Html::a( '<i class="fa fa-dashboard fa-fw"></i> '.$model['title'], ['/kpi-group/dashboard', 'kpi_group'=> $model['id']]);

                }
            ],
            'note:ntext',
            'tags',
//            'sort_order',
            // 'featured',
             'published',
            // 'create_date',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
