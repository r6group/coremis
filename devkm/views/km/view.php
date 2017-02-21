<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\KmItems */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Km Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="km-items-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            //'id',
            //'cat_id',
            'title',
            'detail:html',
            'user_id',
            'tags',
            'create_date',
            'update_date',
        ],
    ]) ?>
    <h2>Comments</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'showHeader' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'km_id',
            'msg:html',
            'user_id',
            'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    <div class="comments-create col-lg-6">

        <h2>Post Comment</h2>

        <?= $this->render('_form_comments', [
            'model' => $model_comments,
        ]) ?>

    </div>

</div>
