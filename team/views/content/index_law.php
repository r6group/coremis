<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use common\models\Profile;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\saraban\models\DocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'กฎหมายที่เกี่ยวข้องด้านการสาธารณสุข';
$this->params['breadcrumbs'][] = $this->title;
?>





<div class="container">

    <div class="row">
        <div class="col-md-9">
            <div class="blog-posts">


                <div class="toggle toggle-primary mt-lg" data-plugin-toggle>


                <?php


                foreach ($models as $model) {

                    $profile = Profile::getProfileByUserId($model->user_id);
                    ?>
                    <section class="toggle">
                        <label><?=$model->subject?></label>
                        <div class="toggle-content">
                            <div class="post-meta">
                                <span><i class="fa fa-calendar"></i> <?=Yii::$app->thai->thaidate('j F Y', strtotime($model->date_create)); ?> </span>
                                <span><i class="fa fa-user"></i> By <a href="http://203.157.145.19/work/hrm/default/view/?id=<?=$profile->id?>"><?=$profile->name.' '.$profile->surname?></a> </span>
                                <span><i class="fa fa-tag"></i> <a href="#">Duis</a>, <a href="#">News</a> </span>
                                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-xs btn-primary']) ?>
                                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-xs btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                                <p><?=$model->description?></p>
                            </div>
                            <div class="" style="margin-left: 20px">
                                <h5 class="mb-none heading-secondary">Download</h5>
                                <blockquote>
                                    <?=$model->listDownloadFiles('attach_files')?>
                                </blockquote>

                            </div>



                        </div>
                    </section>





                    <?php
                }
                ?>
                </div>
                    <?php
                    // display pagination
                    echo LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                    ?>


                <p>
                    <?= Html::a('Create Content', ['create'], ['class' => 'btn btn-success']) ?>
                </p>


            </div>
        </div>

        <div class="col-md-3">
            <aside class="sidebar">

                <?= $this->render('//content/_search.php', ['model'=> $searchModel]) ?>

                <hr>

                <h4 class="heading-primary">Categories</h4>
                <?= $this->render('//layouts/side-menu') ?>
                <hr>

                <div class="tabs mb-xlg">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#popularPosts" data-toggle="tab"><i class="fa fa-star"></i> Popular</a></li>
                        <li><a href="#recentPosts" data-toggle="tab">Recent</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="popularPosts">
                            <ul class="simple-post-list">
                                <?php
                                foreach ($models_pop as $model_pop) {

                                ?>

                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail">
                                            <a href="<?=Url::toRoute(['/content/view', 'id'=>$model_pop->id])?>">
                                                <img src="<?=$model_pop->getFirstThumbnail() ?>" alt="" style="max-width: 50px">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <a href="<?=Url::toRoute(['/content/view', 'id'=>$model_pop->id])?>"><?=mb_strimwidth($model_pop->subject, 0, 40, "...")?></a>
                                        <div class="post-meta">
                                            <?=Yii::$app->thai->thaidate('j F Y', strtotime($model_pop->date_create)); ?>
                                        </div>
                                    </div>
                                </li>
                                    <?php
                                }
                                ?>

                            </ul>
                        </div>
                        <div class="tab-pane" id="recentPosts">
                            <ul class="simple-post-list">
                                <?php
                                foreach ($models_recent as $model_recent) {

                                    ?>

                                    <li>
                                        <div class="post-image">
                                            <div class="img-thumbnail">
                                                <a href="<?=Url::toRoute(['/content/view', 'id'=>$model_recent->id])?>">
                                                    <img src="<?=$model_recent->getFirstThumbnail() ?>" alt="" style="max-width: 50px">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-info">
                                            <a href="<?=Url::toRoute(['/content/view', 'id'=>$model_recent->id])?>"><?=mb_strimwidth($model_recent->subject, 0, 40, "...")?></a>
                                            <div class="post-meta">
                                                <?=Yii::$app->thai->thaidate('j F Y', strtotime($model_recent->date_create)); ?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr>


            </aside>
        </div>
    </div>

</div>