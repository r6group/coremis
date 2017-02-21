<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'HDC Webservice Caller';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hdc-stable-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create HDC Webservice Caller', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'table_name',
            'kpi_id',
            [
                'format'=>'html',
                'label' => 'HDC',
                'value' => function ($model, $key, $index, $widget) {
                    return $model['hdc_url'] == '' ? '' : Html::a('HDC <i class="fa fa-external-link"></i>', $model['hdc_url']);

                }
            ],
            'last_update',
             'status',
             'log:ntext',
            [
                'format'=>'html',
                'label' => 'HDC',
                'value' => function ($model, $key, $index, $widget) {
                    return Html::a( '<i class="fa fa-cloud-download"></i> Import', ['/hdc-s-table/get-hdc-summary', 'table_name'=> $model['table_name']]);

                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
