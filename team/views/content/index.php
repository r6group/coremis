<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use common\models\Profile;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\saraban\models\DocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contents';
$this->params['breadcrumbs'][] = $this->title;
?>





<div class="container">

    <div class="row">
        <div class="col-md-9">
            <div class="blog-posts">





                <?php


                foreach ($models as $model) {

                    $profile = Profile::getProfileByUserId($model->user_id);
                    ?>

                    <article class="post post-medium">
                        <div class="row">

                            <div class="col-md-5">
                                <div class="post-image">
                                    <div class="owl-carousel owl-theme" data-plugin-options='{"items":1}'>
                                        <?=$model->listImagesCarousel('content_file')?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">

                                <div class="post-content">

                                    <h4><a href="<?=Url::toRoute(['/content/view', 'id'=>$model->id, 'ContentSearch[cat_id]'=>$model->cat_id])?>"><?=$model->subject?></a></h4>
                                    <p><?= mb_strimwidth($model->description, 0, 250, "[...]") ?></p>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="post-meta">
                                    <span><i class="fa fa-calendar"></i> <?=Yii::$app->thai->thaidate('j F Y', strtotime($model->content_date)); ?> </span>
                                    <span><i class="fa fa-user"></i> By <a href="http://203.157.145.13/hrm/default/view?id=<?=$profile->id?>"><?=$profile->name.' '.$profile->surname?></a> </span>
                                    <span><i class="fa fa-tag"></i> <a href="#">Duis</a>, <a href="#">News</a> </span>
                                    <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
                                    <a href="<?=Url::toRoute(['/content/view', 'id'=>$model->id])?>" class="btn btn-xs btn-primary pull-right">อ่านต่อ...</a>
                                </div>
                            </div>
                        </div>

                    </article>




                    <?php
                }
                ?>

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