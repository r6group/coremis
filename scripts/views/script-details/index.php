<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScriptDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Script Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="script-details-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Script Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_id',
            'table_name',
            'title',
            'description:ntext',
            // 'script:ntext',
            // 'script_cron',
            // 'force_script_cron',
            // 'active',
            // 'client_office_type',
            // 'create_date',
            // 'last_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
