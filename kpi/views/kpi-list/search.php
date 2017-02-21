<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel kpi\models\KpiListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Search Result';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="search-results">

        <div class="tab-content">
            <div class="mb20" id="search-tab" style="margin-bottom: 20px">
                <?php

                $form = ActiveForm::begin([
                    'action' => ['kpi-list/search'],
                    'method' => 'get',
                    'id' => 'search-big',
                ]);
                ?>
                <div class="input-group input-group-lg">

                    <input class="form-control input-lg" type="search" name="KpiListSearch[title]" placeholder="type keyword ..." value="<?=Yii::$app->getRequest()->getQueryParam('KpiListSearch[title]')?>" />
										<span class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i> Go</button>
						</span>
                </div>

                <?php

                ActiveForm::end();

                ?>




            </div>


            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
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
                    [ 'label' => 'ชื่อตัวชี้วัด', 'attribute' => 'title', 'format' => 'raw',
                        'value'=>function ($model, $key, $index, $widget)  {
                            return '<span class="search-results">'.Html::a($model['title'],['kpi/index', 'id'=> $model['id']]).'</span>'  ;
                        }

                    ],

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

//                    ['class' => 'yii\grid\ActionColumn','contentOptions' => ['style' => 'width:70px;'],],
                ],
            ]); ?>

        </div>
    </div>
