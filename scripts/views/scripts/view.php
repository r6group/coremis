<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use common\models\User;


/* @var $this yii\web\View */
/* @var $model app\models\Scripts */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Scripts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$user = User::findIdentity($model->user_id);

if ($user) {
    $creatorname = $user->f_name.' '.$user->l_name;
} else {
    $creatorname = 'Unknow';
}

?>
<div class="scripts-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <div class="panel panel-default">
        <div class="panel-heading">
            <p>
                <?php

                if ((\Yii::$app->user->identity) && ($model->user_id==\Yii::$app->user->identity->id)) {
                    ?>

                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>

                <?php
                }

                ?>

            </p>

        </div>
        <div class="panel-body">

    <?= DetailView::widget([
        'model' => $model,
        'bordered' => false,
        'striped' => false,
        'mode'=>DetailView::MODE_VIEW,
//        'panel'=>[
//            'heading'=>'Book # ' . $model->id,
//            //'type'=>DetailView::PANEL_INFO,
//        ],
        'responsive' => true,
        'attributes' => [
            //'id',
            'title',
            'description:ntext',
            //'cat_id',
            'master_active',
            'master_cron',
            'force_master_cron',
            'create_date',
            'last_update',
            'public',
            [
                'label'  => 'ทีมพัฒนา Script',
                'value'  =>  $creatorname.Html::a('เพิ่มสมาชิก', ['contributors/create', 'id' => $model->id], ['class' => 'btn btn-primary']),
                'format' => ['raw'],

            ],
            [
                'label'  => 'RestFul URL',
                'value'  => '<b>http://team.sko.moph.go.th/api/v1/scripts/sid/'.$model->id.'</b> ' ,
                'format' => ['raw'],

            ],
            //'user_id',
        ],
    ]) ?>
        </div>
    </div>


    <h2>Reports</h2>
<?php
    if ((\Yii::$app->user->identity) && ($model->user_id==\Yii::$app->user->identity->id)) {
        echo '<p>'.Html::a('สร้างรายงาน', ['script-details/create', 'parent_id'=>$model->id, 'parent_title'=>$model->title], ['class' => 'btn btn-success']).'</p>' ;
    }

?>


    <?php
    if ((\Yii::$app->user->identity) && ($model->user_id==\Yii::$app->user->identity->id)) {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                //'parent_id',
                ['label' => 'Title', 'attribute' => 'title',

                    'format'=>'raw',
                    'value'=>function($d){
                        return Html::a($d['title'], ['script-details/view', 'id'=>$d['id']]);
                        //return '<a href="'.Yii::$app->urlManager->createUrl(['qry/province', 'provid'=>$d['provid']]).'">'.$d['provname'].'</a>';
                    }
                ],
                'table_name',
                'description:ntext',
                // 'script:ntext',
                // 'script_cron',
                // 'force_script_cron',
                'active',
                'client_office_type',
                // 'create_date',
                'last_update',

                ['class' => 'yii\grid\ActionColumn',
                    'controller' => 'script-details',],

            ],
        ]);
    } else {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                //'parent_id',
                ['label' => 'Title', 'attribute' => 'title',

                    'format'=>'raw',
                    'value'=>function($d){
                        return Html::a($d['title'], ['script-details/view', 'id'=>$d['id']]);
                        //return '<a href="'.Yii::$app->urlManager->createUrl(['qry/province', 'provid'=>$d['provid']]).'">'.$d['provname'].'</a>';
                    }
                ],
                'table_name',
                'description:ntext',
                // 'script:ntext',
                // 'script_cron',
                // 'force_script_cron',
                'active',
                'client_office_type',
                // 'create_date',
                'last_update',

            ],
        ]);
    }

    ?>









</div>
