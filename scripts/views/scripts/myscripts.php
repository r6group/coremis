<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScriptsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Scripts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scripts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Scripts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'title',
            ['label' => 'Title', 'attribute' => 'title',

                'format'=>'raw',
                'value'=>function($d){
                    return "<span class=\"badge pull-right\">".$d['จำนวนรายงาน']."</span>".Html::a($d['title'], ['scripts/view', 'id'=>$d['id']]);
                    //return '<a href="'.Yii::$app->urlManager->createUrl(['qry/province', 'provid'=>$d['provid']]).'">'.$d['provname'].'</a>';
                }
            ],
            'description:ntext',
            //'cat_id',
            'master_active',
            // 'master_cron',
            // 'force_master_cron',
            // 'create_date',
            //'จำนวนรายงาน',

            'last_update',
            'public',
            // 'user_id',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



</div>
