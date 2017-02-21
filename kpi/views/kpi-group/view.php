<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model kpi\models\KpiGroup */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Kpi Dashboard', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-group-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= (\Yii::$app->user->identity && $model->user_id == \Yii::$app->user->identity->getId()) ? Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])  : ''?>
        <?= (\Yii::$app->user->identity && $model->user_id == \Yii::$app->user->identity->getId()) ? Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])  : ''?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'title',
            'note:ntext',
            'tags',
//            'sort_order',
//            'featured',
            'published',
            'create_date',
//            'user_id',
        ],
    ]) ?>



        <div>

            <?= (\Yii::$app->user->identity && $model->user_id == \Yii::$app->user->identity->getId()) ? Html::a('Create Kpi Template', ['/my-kpi/create', 'group_id' => $model->id], ['class' => 'btn btn-success pull-right']) : ''?><h3>KPIs</h3>


        </div>
    <br>

    <div>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            //'tableOptions' =>['class' => 'table table-hover'],
            // parameters from the demo form
            'bordered'=>false,
            'striped'=>false,
            'condensed'=>false,
            'responsive'=>true,
            'hover'=>true,
            'floatHeader'=>true,
            'floatHeaderOptions'=>['scrollingTop'=>'50'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'title',
                //'id',
                'kpi_year',
                'kpi_no',
                'kpi_level',

                //'kpi_order',

                // 'description:ntext',
                // 'kpi_unit',
                // 'target:ntext',
                // 'pop_target',
                // 'goal',
                // 'max_value',
                // 'method:ntext',
                // 'data_source:ntext',
                // 'a_unit',
                // 'a_desc:ntext',
                // 'b_unit',
                // 'b_desc:ntext',
                // 'formula:ntext',
                // 'level_ministry:boolean',
                // 'level_region:boolean',
                // 'level_province:boolean',
                // 'level_impotant:boolean',
                // 'level_ceo_assess:boolean',
                // 'tags:ntext',
                // 'eval_freq:ntext',
                // 'baseline:ntext',
                // 'eval_rule:ntext',
                // 'eval_method:ntext',
                // 'doc:ntext',
                // 'tech_support:ntext',
                // 'director:ntext',
                // 'reporter:ntext',
                // 'areabase_kpi_provcode',
                // 'areabase_kpi_regioncode',
                // 'remark:ntext',
                // 'last_update',

                ['class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'width:70px;'],
                    'controller' => 'my-kpi',],
            ],
        ]); ?>
    </div>
</div>
