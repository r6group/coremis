<?php

/**
 * @var yii\web\View $this
 * @var mdm\admin\models\AuthItem $model
 */

$this->title = Yii::t('rbac-admin', 'Create Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">

    <div class="box box-body">

        <?php echo $this->render('_form', [
            'model' => $model,
        ]); ?>

    </div>
</div>
