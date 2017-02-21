<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\models\Profile;
use dosamigos\disqus\Comments;

/* @var $this yii\web\View */
/* @var $model app\modules\saraban\models\Doc */

$this->title = $model->subject;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index']];
$this->params['hide_title'] = true;

$profile = Profile::getProfileByUserId($model->user_id);
$model->hits = $model->hits + 1;
$model->save();
?>



<div class="container">

    <div class="row">
        <div class="col-md-9">
            <div class="blog-posts single-post">

                <article class="post post-large blog-single-post">




                    <div class="post-date">


                        <span class="day"><?=Yii::$app->thai->thaidate('j', strtotime($model->content_date)); ?></span>
                        <span class="month"><?=Yii::$app->thai->thaidate('My', strtotime($model->content_date)); ?></span>
                    </div>

                    <div class="post-content">

                        <h3><?=$model->subject?></h3>

                        <div class="post-meta">
                            <span><i class="fa fa-user"></i> By <a href="http://203.157.145.19/work/hrm/default/view/?id=<?=$profile->id?>"><?=$profile->name.' '.$profile->surname?></a> </span>
                            <span><i class="fa fa-tag"></i> <a href="#">Duis</a>, <a href="#">News</a> </span>
                            <span><i class="fa fa-comments"></i> <a href="#"><?=$model->hits?> Page views</a></span>
                        </div>
                        <?=$model->listImagesMasonry()?> <br>
                        <?=$model->description?>


                        <?=$model->listDownloadFiles('attach_files')?>




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

                        <div class="post-block post-share">
                            <h3 class="heading-primary"><i class="fa fa-share"></i>แชร์บทความนี้</h3>

                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style ">
                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                <a class="addthis_button_facebook_share" fb:share:layout="button_count"></a>
                                <a class="addthis_button_tweet"></a>
                                <a class="addthis_counter addthis_pill_style"></a>
                            </div>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-567b984d31acd85d" async="async"></script>

                            <!-- AddThis Button END -->

                        </div>




                        <div class="post-block post-comments clearfix">
                            <h3 class="heading-primary"><i class="fa fa-comments"></i>Comments</h3>

                            <div id="disqus_thread"></div>
                            <script>
                                /**
                                 * RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                 * LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                                 */
                                /*
                                 var disqus_config = function () {
                                 this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
                                 this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                 };
                                 */
                                (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');

                                    s.src = '//skomoph.disqus.com/embed.js';

                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>


                        </div>



                    </div>
                </article>

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
                                                <?=Yii::$app->thai->thaidate('j F Y', strtotime($model_pop->content_date)); ?>
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
                                                <?=Yii::$app->thai->thaidate('j F Y', strtotime($model_recent->content_date)); ?>
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



<script id="dsq-count-scr" src="//skomoph.disqus.com/count.js" async></script>