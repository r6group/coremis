<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\saraban\models\DocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Doc', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ref',
            'subject',
            'description:ntext',
            'doc_no',
            // 'doc_date',
            // 'type',
            // 'from',
            // 'to:ntext',
            // 'urgent',
            // 'secret',
            // 'doc',
            // 'attach:ntext',
            // 'user_id',
            // 'remark:ntext',
            // 'date_create',
            // 'last_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
