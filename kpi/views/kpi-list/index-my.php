<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel kpi\models\KpiListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My KPI Templates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-list-index">
    <div class="text-center mb20">
        <h3>คุณมี KPI ขององค์กร?</h3>
        <p>คุณสามารถสร้าง KPI ขึ้นมาใช้เองในองค์กรคุณได้ง่ายๆ ที่นี่</p>
    </div>
    <div class="row">
        <div>
        <?= Html::a('Create Kpi Template', ['create'], ['class' => 'btn btn-success pull-right']) ?><h3><?= Html::encode($this->title) ?></h3>

        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


        <div>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
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

                    ['class' => 'yii\grid\ActionColumn','contentOptions' => ['style' => 'width:70px;'],],
                ],
            ]); ?>
        </div>



</div>
