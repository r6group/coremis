<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\hrm\models\ProfileSearch $searchModel
 */

$this->title = 'People Directory';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-sm-8 col-md-9 col-lg-10 people-list">
        <div class="people-options clearfix">
            <div class="btn-toolbar pull-left">

                <?=Html::a('<i class="fa fa-user-plus"></i><span><b> เพิ่มบุคลากร</b><span>', ['default/create'], ['class' => 'btn btn-success btn-quirk'])?>
                <button type="button" class="btn btn-success btn-quirk">Add to Group</button>

            </div>

            <div class="btn-group pull-right people-pager">
                <a href="people-directory-grid.html" class="btn btn-default"><i class="fa fa-th"></i></a>
                <button type="button" class="btn btn-default-active"><i class="fa fa-th-list"></i></button>
            </div>

            <div class="btn-group pull-right people-pager">
                <a href="<?= Url::current(['page' => $pages->page ])?>" type="button" class="btn btn-default<?= ($pages->page == 0)? ' disabled' : '' ?>"><i class="fa fa-chevron-left"></i></a>
                <a href="<?= Url::current(['page' => $pages->page +2])?>" type="button" class="btn btn-default<?= ($pages->page +1 == $pages->pageCount)? ' disabled' : '' ?>"><i class="fa fa-chevron-right"></i></a>
            </div>
                <span
                    class="people-count pull-right">Showing <strong><?=($pages->page * $pages->pagesize) + 1?>-<?=($pages->page + 1) * $pages->pagesize?></strong> of <strong><?=$pages->totalCount?></strong> users</span>
        </div>
        <!-- people-options -->

        <?php

        foreach ($models as $model) {
            $avatar = $this->theme->baseUrl.'/images/photos/loggeduser.png';
            if (!empty($model['avatar_url'])) {
                $avatar = Url::toRoute('/images/avatars/').$model['avatar_url'];
            }

            ?>

            <div class="panel panel-profile list-view">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-left">
                            <?=Html::a('<img class="media-object img-circle" src="'.$avatar.'" alt="">', ['default/view', 'id' => $model['id'], 'name' => $model['name']])?>


                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?=$model['name'].' '.$model['surname']?></h4>

                            <p class="media-usermeta"><i class="glyphicon glyphicon-briefcase"></i>
                            <?=ArrayHelper::getValue($model->getPositionArray(), $model->main_pst, '(ไม่ระบุตำแหน่ง)') .' '.ArrayHelper::getValue($model->getPostypenameArray(), $model->plevel, '');?></p>
                        </div>
                    </div>
                    <!-- media -->
                    <ul class="panel-options">
                        <li><a class="tooltips" href="" data-toggle="tooltip" title="View Options"><i
                                    class="glyphicon glyphicon-option-vertical"></i></a></li>
                    </ul>
                </div>
                <!-- panel-heading -->

                <div class="panel-body people-info">
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="info-group">
                                <label>Email</label>
                                <?=$model['email']?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="info-group">
                                <label>Phone</label>
                                <a href="tel:<?=$model['mobile_tel']?>"><?=$model['mobile_tel']?></a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="info-group">
                                <label>Social</label>

                                <div class="">
                                    <i class="fa fa-facebook-official"></i>
                                    <i class="fa fa-twitter"></i>
                                    <i class="fa fa-dribbble"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- row -->
                </div>
            </div>
            <!-- panel -->

            <?php
        }
        ?>

        <?php
        // display pagination
        echo LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>

    </div>
    <div class="col-sm-4 col-md-3 col-lg-2">

        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">Filter Users</h4>
            </div>
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>


            <div class="panel-body">
                <div class="form-group">
                    <?= $form->field($searchModel, 'name') ?>
                </div>
                <div class="form-group">
                    <?= $form->field($searchModel, 'mobile_tel') ?>

                </div>
                <div class="form-group">
                    <?= $form->field($searchModel, 'email') ?>

                </div>
                <div class="form-group">
                    <label class="control-label center-block">Gender:</label>
                    <label class="ckbox ckbox-inline mr20">
                        <input type="checkbox" checked><span>Female</span>
                    </label>
                    <label class="ckbox ckbox-inline">
                        <input type="checkbox" checked><span>Male</span>
                    </label>
                </div>
                <?= Html::submitButton('Filter List', ['class' => 'btn btn-success btn-quirk btn-block']) ?>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <!-- panel -->

    </div>

