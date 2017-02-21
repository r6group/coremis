<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Profile;

/* @var $this yii\web\View */
/* @var $searchModel team\modules\user\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

Yii::$app->view->registerJsFile(Url::to('@web/themes/quirk/lib/jquery-ui/jquery-ui.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title                   = 'Personal Area';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile(Url::to('@web/gallery-lib/js/blueimp-gallery.min.js'), ['depends' => [\yii\web\JqueryAsset::className()]]); // กรณีเอาไว้ใต้ jquery
$this->registerCssFile(Url::to('@web/gallery-lib/css/blueimp-gallery.min.css'));

$this->registerJs("

document.getElementById('links').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
        link = target.src ? target.parentNode : target,
        options = {index: link, event: event},
        links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
};


", yii\web\View::POS_END, 'my-options');


?>

<div class="row">
    <div class="col-sm-8 col-md-9 col-lg-10">

        <div class="row">
            <a href="" class="profile-photo"><img class="img-circle img-responsive" style="max-width: 100px;  z-index: 1000; border-color: #fff;border-width: 3px;border-style :solid;" src="<?= Profile::getAvatarByUserId(Yii::$app->user->identity->getId())?>" alt=""></a>

        </div>
        <div class="timeline-wrapper">

            <div class="timeline-date">Sunday, July 05, 2015</div>

            <div class="panel panel-post-item status">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img alt="" src="<?php echo $this->theme->baseUrl ?>/images/photos/user1.png" class="media-object img-circle">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Christina R. Hill</h4>
                            <p class="media-usermeta">
                                <span class="media-time">10:30 น.</span>
                                <i class="glyphicon glyphicon-map-marker"></i> <a href="">San Francisco, CA</a>
                            </p>
                        </div>
                    </div><!-- media -->
                    <ul class="panel-options">
                        <li><a class="tooltips" href="" data-toggle="tooltip" title="View Options"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                    </ul>
                </div><!-- panel-heading -->
                <div class="panel-body">
                    Prototyping is one of the best things that can happen within a project, yet it is extremely underutilized. <a href="">#prototype</a>
                </div>
                <div class="panel-footer">
                    <ul class="list-inline">
                        <li><a href=""><i class="glyphicon glyphicon-heart"></i> Like</a></li>
                        <li><a data-target="#comment-1" data-toggle="collapse"><i class="glyphicon glyphicon-comment"></i> Comments (2)</a></li>
                        <li class="pull-right">24 liked this</li>
                    </ul>
                </div>
                <div class="collapse" id="comment-1">
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user2.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Floyd M. Romero <small>8 minutes ago</small></h4>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user3.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Jennie S. Gray <small>5 minutes ago</small></h4>
                                Nor again is there anyone who loves or pursues or desires to obtain pain of itself,
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Write some comments">
                </div>
            </div><!-- panel panel-post -->

            <div class="panel panel-post-item status">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img alt="" src="<?php echo $this->theme->baseUrl ?>/images/photos/user2.png" class="media-object img-circle">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Floyd M. Romero</h4>
                            <p class="media-usermeta">
                                <span class="media-time">09:52 น.</span>
                                <i class="glyphicon glyphicon-map-marker"></i> <a href="">Sydney, Australia</a>
                            </p>
                        </div>
                    </div><!-- media -->
                    <ul class="panel-options">
                        <li><a class="tooltips" href="" data-toggle="tooltip" title="View Options"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                    </ul>
                </div><!-- panel-heading -->
                <div class="panel-body">
                    In my experience, the most important factors are the client and the project’s complexity. Even if I understand the project well, I would like a high-fidelity, high-functionality prototype just in case. One of the fundamental mistakes you can make in projects is thinking you know them well. <a href="">#prototype</a> <a href="">#complexity</a>
                </div>
                <div class="panel-footer">
                    <ul class="list-inline">
                        <li><a href=""><i class="glyphicon glyphicon-heart"></i> Like</a></li>
                        <li><a><i class="glyphicon glyphicon-comment"></i> Comments (0)</a></li>
                        <li class="pull-right">5 liked this</li>
                    </ul>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Write some comments">
                </div>
            </div><!-- panel panel-post -->

            <div class="panel panel-post-item commented">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img alt="" src="<?php echo $this->theme->baseUrl ?>/images/photos/user3.png" class="media-object img-circle">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Jennie S. Gray <span>commented on this</span></h4>
                            <p class="media-usermeta">
                                <span class="media-time">09:24 น.</span>
                                <i class="glyphicon glyphicon-map-marker"></i> <a href="">Tokyo, Japan</a>
                            </p>
                        </div>
                    </div><!-- media -->
                    <ul class="panel-options">
                        <li><a class="tooltips" href="" data-toggle="tooltip" title="View Options"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                    </ul>
                </div><!-- panel-heading -->
                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object width100" src="<?php echo $this->theme->baseUrl ?>/images/image.png" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="">Five steps to Website Redesign</a></h4>
                            <p>For the past 12 years, Website Redesign Pros has been redesigning New York City’s very own breed of internet ventures. Once considered as the last recourse to rebirth by the rarest of rare internet entrepreneurs, ...</p>
                            <p class="mt10"><a href="http://goo.gl/d0jake">http://goo.gl/d0jake</a></p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <ul class="list-inline">
                        <li><a href=""><i class="glyphicon glyphicon-heart"></i> Like</a></li>
                        <li><a data-target="#comment-2" data-toggle="collapse"><i class="glyphicon glyphicon-comment"></i> Comments (1)</a></li>
                        <li class="pull-right">2 liked this</li>
                    </ul>
                </div>
                <div class="collapse" id="comment-2">
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user3.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Jennie S. Gray <small>8 minutes ago</small></h4>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Write some comments">
                </div>
            </div><!-- panel panel-post -->

            <div class="panel panel-post-item pictures">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img alt="" src="<?php echo $this->theme->baseUrl ?>/images/photos/user3.png" class="media-object img-circle">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Alia J. Locher <span>added 3 new photos</span></h4>
                            <p class="media-usermeta">
                                <span class="media-time">09:06 น.</span>
                                <i class="glyphicon glyphicon-map-marker"></i> <a href="">Tokyo, Japan</a>
                            </p>
                        </div>
                    </div><!-- media -->
                    <ul class="panel-options">
                        <li><a class="tooltips" href="" data-toggle="tooltip" title="View Options"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                    </ul>
                </div><!-- panel-heading -->
                <div class="panel-body" style="padding: 0px">
                    <div class="row photos" id="links">


                        <div class="col-xs-8">
                            <a href="http://farm4.static.flickr.com/3825/9476606873_42ed88704d_b.jpg"><img class="img-responsive gallery-item" style="padding: 0px;" src="http://farm4.static.flickr.com/3825/9476606873_42ed88704d_b.jpg" alt=""></a>
                        </div>
                        <div class="col-xs-4">
                            <a href="http://farm4.static.flickr.com/3712/9478186779_81c2e5f7ef_b.jpg"><img class="img-responsive gallery-item" style="padding: 0px; padding-bottom: 1px; padding-left: 2px;" src="http://farm4.static.flickr.com/3712/9478186779_81c2e5f7ef_b.jpg" alt=""></a>
                            <a href="http://farm4.static.flickr.com/3789/9476654149_b4545d2f25_b.jpg"><img class="img-responsive gallery-item" style="padding: 0px; padding-top: 1px; padding-left: 2px;" src="http://farm4.static.flickr.com/3789/9476654149_b4545d2f25_b.jpg" alt=""></a>
                        </div>

                    </div>
                    <div id="blueimp-gallery" class="blueimp-gallery">
                        <div class="slides"></div>
                        <h3 class="title"></h3>
                        <a class="prev">‹</a>
                        <a class="next">›</a>
                        <a class="close">×</a>
                        <a class="play-pause"></a>
                        <ol class="indicator"></ol>
                    </div>

                </div>
                <div class="panel-footer">
                    <ul class="list-inline">
                        <li><a href=""><i class="glyphicon glyphicon-heart"></i> Like</a></li>
                        <li><a><i class="glyphicon glyphicon-comment"></i> Comments (0)</a></li>
                        <li class="pull-right">19 liked this</li>
                    </ul>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Write some comments">
                </div>
            </div><!-- panel panel-post -->

            <div class="panel panel-post-item twitter">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img alt="" src="<?php echo $this->theme->baseUrl ?>/images/photos/user5.png" class="media-object img-circle">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Nicholas T. Hinkle <span>shared a tweet</span></h4>
                            <p class="media-usermeta">
                                <span class="media-time">08:46 น.</span>
                                <i class="glyphicon glyphicon-map-marker"></i> <a href="">Madrid, Spain</a>
                            </p>
                        </div>
                    </div><!-- media -->
                    <ul class="panel-options">
                        <li><a class="tooltips" href="" data-toggle="tooltip" title="View Options"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                    </ul>
                </div><!-- panel-heading -->
                <div class="panel-body">
                    <p>Whenever there’s a crisis of confidence in terms of strategy, planning, or work mechanisms, a company is forced to take the restructuring route.</p>
                    <p>via Twitter</p>
                </div>
            </div><!-- panel panel-post -->

            <div class="timeline-date">Friday, July 03, 2015</div>

            <div class="panel panel-post-item twitter">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img alt="" src="<?php echo $this->theme->baseUrl ?>/images/photos/user6.png" class="media-object img-circle">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Jamie W. Bradford <span>shared a tweet</span></h4>
                            <p class="media-usermeta">
                                <span class="media-time">10:15 น.</span>
                                <i class="glyphicon glyphicon-map-marker"></i> <a href="">Bali, Indonesia</a>
                            </p>
                        </div>
                    </div><!-- media -->
                    <ul class="panel-options">
                        <li><a class="tooltips" href="" data-toggle="tooltip" title="View Options"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                    </ul>
                </div><!-- panel-heading -->
                <div class="panel-body">
                    <p>A friend of mine who is new to web designing told me he is having facing some difficulties creating layouts using tables.</p>
                    <p>via Twitter</p>
                </div>
            </div><!-- panel panel-post -->

            <div class="panel panel-post-item commented">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img alt="" src="<?php echo $this->theme->baseUrl ?>/images/photos/user3.png" class="media-object img-circle">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Jennie S. Gray <span>published a new article</span></h4>
                            <p class="media-usermeta">
                                <span class="media-time">09:24 น.</span>
                                <i class="glyphicon glyphicon-map-marker"></i> <a href="">Sacramento, CA, USA</a>
                            </p>
                        </div>
                    </div><!-- media -->
                    <ul class="panel-options">
                        <li><a class="tooltips" href="" data-toggle="tooltip" title="View Options"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                    </ul>
                </div><!-- panel-heading -->
                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object width100" src="<?php echo $this->theme->baseUrl ?>/images/image.png" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="">Getting started with Bootstrap</a></h4>
                            <p>For any front-ender or coder, sooner or later the time comes to create his/her own small framework. It usually consists of those rules and functions that had to be repeated in every recent project...</p>
                            <p class="mt10"><a href="http://goo.gl/dXxNxR">http://goo.gl/dXxNxR</a></p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <ul class="list-inline">
                        <li><a href=""><i class="glyphicon glyphicon-heart"></i> Like</a></li>
                        <li><a><i class="glyphicon glyphicon-comment"></i> Comments (0)</a></li>
                        <li class="pull-right">18 liked this</li>
                    </ul>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Write some comments">
                </div>
            </div><!-- panel panel-post -->

            <div class="timeline-date"><a href="">Load more...</a></div>

        </div><!-- timeline-wrapper -->
    </div>
    <div class="col-sm-4 col-md-3 col-lg-2">
        <?= $this->render('//layouts/side-menu') ?>
        <div class="panel panel-primary-full">
            <div class="panel-heading">
                <h3 class="panel-title">Headlines</h3>
            </div>
            <div class="panel-body">
                <p class="nomargin">Graeco feugait ea quo. Quot erat vidit ad nam, mea quod nostro dolores ad. Elitr theophrastus vis ex. Volutpat consulatu vel ex. Viderer consulatu ei pro, in has aliquid placerat philosophia, timeam admodum minimum vim no.</p>
            </div>
        </div><!-- panel -->

        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">People You May Know</h4>
            </div>
            <div class="panel-body">
                <ul class="media-list user-list">
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user9.png" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="">Ashley T. Brewington</a></h4>
                            <span>5,323</span> Followers
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user10.png" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="">Roberta F. Horn</a></h4>
                            <span>4,100</span> Followers
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user3.png" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="">Jennie S. Gray</a></h4>
                            <span>3,508</span> Followers
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user4.png" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="">Alia J. Locher</a></h4>
                            <span>3,508</span> Followers
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user6.png" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="">Jamie W. Bradford</a></h4>
                            <span>2,001</span> Followers
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- panel -->

        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">Your Followers Activity</h4>
            </div>
            <div class="panel-body">
                <ul class="media-list user-list">
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user2.png" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading nomargin"><a href="">Floyd M. Romero</a></h4>
                            is now following <a href="">Christina R. Hill</a>
                            <small class="date"><i class="glyphicon glyphicon-time"></i> Just now</small>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user10.png" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading nomargin"><a href="">Roberta F. Horn</a></h4>
                            commented on <a href="">HTML5 Tutorial</a>
                            <small class="date"><i class="glyphicon glyphicon-time"></i> Yesterday</small>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user3.png" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading nomargin"><a href="">Jennie S. Gray</a></h4>
                            posted a video on <a href="">The Discovery</a>
                            <small class="date"><i class="glyphicon glyphicon-time"></i> June 25, 2015</small>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user5.png" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading nomargin"><a href="">Nicholas T. Hinkle</a></h4>
                            liked your video on <a href="">The Discovery</a>
                            <small class="date"><i class="glyphicon glyphicon-time"></i> June 24, 2015</small>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user2.png" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading nomargin"><a href="">Floyd M. Romero</a></h4>
                            liked your photo on <a href="">My Life Adventure</a>
                            <small class="date"><i class="glyphicon glyphicon-time"></i> June 24, 2015</small>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- panel -->
    </div>
</div><!-- row -->

