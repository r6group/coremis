<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model kpi\models\KpiList */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Kpi Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <h3><?= Html::encode($this->title) ?></h3>
<a href="<?=Url::toRoute(['kpi/index', 'id'=>$model->id])?>" class="btn btn-success pull-right" role="button">ผลการดำเนินงาน >></a>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            //'id',
            [
                'format'=>'html',
                'label' => 'Child KPI',
                'value' => $child_html.'<a href='.Url::toRoute(['/kpi-list/create', 'parent_id'=>$model->id]).' class="btn btn-sm btn-primary" role="button">Create Child KPI</a>'
            ],
            'kpi_year',
            'kpi_level',
            'kpi_no',
            'kpi_order',
            'description:html',
            'kpi_unit',
            'a_unit',
            'a_desc:ntext',
            'b_unit',
            'b_desc:ntext',
            'c_unit',
            'c_desc:ntext',
            'd_unit',
            'd_desc:ntext',
            'e_unit',
            'e_desc:ntext',
            'f_unit',
            'f_desc:ntext',
            'formula',
            'operator:ntext',
            'target:ntext',
            'pop_target',
            'goal',
            'max_value',
            'method:html',
            'data_source:html',
            'level_ministry:boolean',
            'level_region:boolean',
            'level_province:boolean',
            'level_impotant:boolean',
            'level_ceo_assess:boolean',
            'tags:ntext',
            'eval_freq:html',
            'baseline:html',
            'eval_rule:html',
            'eval_method:html',
            'doc:html',
            'tech_support:html',
            'director:html',
            'reporter:html',
            'areabase_kpi_provcode',
            'areabase_kpi_regioncode',
            'remark:html',
            'last_update',
            [
                'format'=>'html',
                'label' => 'Download',
                'value' => $model->listDownloadFiles('attach_files')
            ],
        ],
    ]) ?>

<a href="<?=Url::toRoute(['kpi/create-data-table', 'id'=>$model->id])?>" class="btn btn-primary" role="button">Create Data Table</a>

<a href="<?=Url::toRoute(['kpi/index', 'id'=>$model->id])?>" class="btn btn-success pull-right" role="button">ผลการดำเนินงาน >></a>