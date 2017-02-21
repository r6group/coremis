<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContributorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contributors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contributors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contributors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'script_id',
            'user_id',
            'join_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
