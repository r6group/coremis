<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ScriptDetails */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'My Scripts', 'url' => ['scripts/myscripts']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="script-details-view">

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
            'parent_id',
            'table_name',
            'title',
            'description:ntext',
            'script:ntext',
            'script_cron',
            'force_script_cron',
            'active',
            'client_office_type',
            'create_date',
            'last_update',
        ],
    ]) ?>

</div>
