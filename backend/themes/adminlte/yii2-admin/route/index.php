<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 */
$this->title = Yii::t('rbac-admin', 'Routes');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="box box-body">
        <p>
            <?= Html::a(Yii::t('rbac-admin', 'Create route'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div>
            <div class="col-lg-5">
                <?= Yii::t('rbac-admin', 'Avaliable') ?>:
                <?php

                echo Html::a('<span class="glyphicon glyphicon-refresh"></span>', '', ['id' => 'btn-refresh']);

                echo Html::textInput('search_av', '', ['class' => 'role-search', 'data-target' => 'new', 'style' => 'width:100%']) . ' ';

                echo '<br><br>';
                echo Html::listBox('routes', '', $new, [
                    'id' => 'new',
                    'multiple' => true,
                    'size' => 20,
                    'style' => 'width:100%']);
                ?>
            </div>
            <div class="col-lg-1" style="text-align: center;">
                &nbsp;<br><br><br><br>
                <?php
                echo Html::a('>>', '#', ['class' => 'btn btn-success', 'data-action' => 'assign']) . '<br><br>';
                echo Html::a('<<', '#', ['class' => 'btn btn-success', 'data-action' => 'delete']) . '<br>';
                ?>
            </div>
            <div class="col-lg-5">
                <?= Yii::t('rbac-admin', 'Assigned') ?>:
                <?php
                echo Html::textInput('search_asgn', '', ['class' => 'role-search', 'data-target' => 'exists', 'style' => 'width:100%']) . '<br><br>';
                echo Html::listBox('routes', '', $exists, [
                    'id' => 'exists',
                    'multiple' => true,
                    'size' => 20,
                    'style' => 'width:100%',
                    'options' => $existsOptions]);
                ?>
            </div>
        </div>
    </div>
<?php
$this->render('_script');
