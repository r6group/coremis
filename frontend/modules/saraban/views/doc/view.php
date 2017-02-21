<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\saraban\models\Doc */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Docs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doc-view">

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
            'id',
            'ref',
            'subject',
            'description:ntext',
            'doc_no',
            'doc_date',
            'type',
            'from',
            'to:ntext',
            'urgent',
            'secret',
            ['attribute'=>'doc_file','value'=>$model->listDownloadFiles('doc_file'),'format'=>'html'],
            ['attribute'=>'attach_files','value'=>$model->listDownloadFiles('attach_files'),'format'=>'html'],
            'user_id',
            'remark:ntext',
            'date_create',
            'last_update',
        ],
    ]) ?>

</div>
