<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kpi Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-data-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kpi Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hospcode',
            'kpi_year',
            'kpi_no',
            'kpi_id',
            // 'provcode',
            // 'distcode',
            // 'subdistcode',
            // 'kpi_a_value_10',
            // 'kpi_b_value_10',
            // 'kpi_c_value_10',
            // 'kpi_d_value_10',
            // 'kpi_e_value_10',
            // 'kpi_f_value_10',
            // 'kpi_a_value_11',
            // 'kpi_b_value_11',
            // 'kpi_c_value_11',
            // 'kpi_d_value_11',
            // 'kpi_e_value_11',
            // 'kpi_f_value_11',
            // 'kpi_a_value_12',
            // 'kpi_b_value_12',
            // 'kpi_c_value_12',
            // 'kpi_d_value_12',
            // 'kpi_e_value_12',
            // 'kpi_f_value_12',
            // 'kpi_a_value_1',
            // 'kpi_b_value_1',
            // 'kpi_c_value_1',
            // 'kpi_d_value_1',
            // 'kpi_e_value_1',
            // 'kpi_f_value_1',
            // 'kpi_a_value_2',
            // 'kpi_b_value_2',
            // 'kpi_c_value_2',
            // 'kpi_d_value_2',
            // 'kpi_e_value_2',
            // 'kpi_f_value_2',
            // 'kpi_a_value_3',
            // 'kpi_b_value_3',
            // 'kpi_c_value_3',
            // 'kpi_d_value_3',
            // 'kpi_e_value_3',
            // 'kpi_f_value_3',
            // 'kpi_a_value_4',
            // 'kpi_b_value_4',
            // 'kpi_c_value_4',
            // 'kpi_d_value_4',
            // 'kpi_e_value_4',
            // 'kpi_f_value_4',
            // 'kpi_a_value_5',
            // 'kpi_b_value_5',
            // 'kpi_c_value_5',
            // 'kpi_d_value_5',
            // 'kpi_e_value_5',
            // 'kpi_f_value_5',
            // 'kpi_a_value_6',
            // 'kpi_b_value_6',
            // 'kpi_c_value_6',
            // 'kpi_d_value_6',
            // 'kpi_e_value_6',
            // 'kpi_f_value_6',
            // 'kpi_a_value_7',
            // 'kpi_b_value_7',
            // 'kpi_c_value_7',
            // 'kpi_d_value_7',
            // 'kpi_e_value_7',
            // 'kpi_f_value_7',
            // 'kpi_a_value_8',
            // 'kpi_b_value_8',
            // 'kpi_c_value_8',
            // 'kpi_d_value_8',
            // 'kpi_e_value_8',
            // 'kpi_f_value_8',
            // 'kpi_a_value_9',
            // 'kpi_b_value_9',
            // 'kpi_c_value_9',
            // 'kpi_d_value_9',
            // 'kpi_e_value_9',
            // 'kpi_f_value_9',
            // 'reporter_id',
            // 'note:ntext',
            // 'last_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
