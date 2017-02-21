<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\User;
use yii\widgets\LinkPager;

$this->title = 'Smart Office';
$this->params['hide_footer'][] = true;

$this->registerCssFile(Url::to('@web/themes/quirk/lib/summernote/summernote.css'));

$this->registerJsFile(Url::to('@web/themes/quirk/lib/summernote/summernote.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs("
$(document).ready(function() {
  $('.emailcontent input[type=checkbox]').click(function() {
    if($(this).is(':checked')) {
      $(this).closest('.list-group-item').addClass('selected');
    } else {
      $(this).closest('.list-group-item').removeClass('selected');
    }
  });

  // Mark a star
  $('.markstar').click(function() {
    if($(this).hasClass('starred')) {
      $(this).removeClass('starred');
    } else {
      $(this).addClass('starred');
    }
  });

  // Clicking a message
  $('.list-group-item > .media').click(function() {

    $('.list-group-item').each(function() {
      $(this).removeClass('active');
    });


    $('.mailcontent').addClass('hide');


            var doccontent = $('#doc-content');
            var div = $('#doc-content' + $(this).data('id'));
            var readicon = $('#read-status' + $(this).data('id'));

            div.removeClass('hide');

            if (div.attr('data-loaded') != 'true') {

                div.html('<img src=\"https://upload.wikimedia.org/wikipedia/commons/b/b6/Loading_2_transparent.gif\"> loading...');

                // run ajax request
                $.ajax({
                    type: 'GET',
                    url: '". Url::toRoute('/saraban/default/inner-msg')."?id=' + $(this).data('id'),
                    timeout:3000,
                    success: function (msg) {

                            div.html(msg);
                            //div.append('<a href=\"javascript:;\" class=\"btn yellow-crusta\"> ข้อมูลเพิ่มเติม <i class=\"fa fa-info-circle\"></i></a>');
                            div.attr('data-loaded', 'true');
                            doccontent.data('id', $(this).data('id'));
                            readicon.removeClass('fa-envelope').addClass('fa-envelope-o');

                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        div.html('<h3 class=\"nomail\">Status: ' + textStatus + '<br>Error: ' + errorThrown + '</h3>');
                }
                });
            } else {
                //doccontent.html('<img src=\"http://upload.wikimedia.org/wikipedia/commons/b/b6/Loading_2_transparent.gif\"> loading...');
                if (doccontent.data('id') != $(this).data('id')) {
                    doccontent.data('id', $(this).data('id'));
                    $('#doc-panel').scrollTop(0);

                }

            }



    $(this).parent().addClass('active').removeClass('unread');

    $('.nomail').addClass('hide');
    //$('.mailcontent').removeClass('hide');
  });


  // Summernote
  $('#summernote, #summernote2').summernote({
    height: 100,
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']]
    ]
  });

});
", yii\web\View::POS_END, 'my-options');
?>

<div class="row">
    <div class="email-options">
        <div class="settings">
            <a href="" class="tooltips" data-toggle="tooltip" data-placement="bottom" title=""
               data-original-title="Archive"><i class="fa fa-archive"></i></a>
            <a href="" class="tooltips" data-toggle="tooltip" data-placement="bottom" title=""
               data-original-title="Report Spam"><i class="fa fa-exclamation-triangle"></i></a>
            <a href="" class="tooltips" data-toggle="tooltip" data-placement="bottom" title=""
               data-original-title="Move to Folder"><i class="fa fa-folder-open"></i></a>
            <a href="" class="tooltips" data-toggle="tooltip" data-placement="bottom" title=""
               data-original-title="Add Tag"><i class="fa fa-tag"></i></a>
            <a href="" class="tooltips" data-toggle="tooltip" data-placement="bottom" title=""
               data-original-title="Move to Trash"><i class="fa fa-trash"></i></a>
            <a href="" class="tooltips" data-toggle="tooltip" data-placement="bottom" title=""
               data-original-title="More"><i class="fa fa-ellipsis-v"></i></a>
        </div>

        <label class="ckbox">
            <input type="checkbox"><span></span>
        </label>
    </div>
    <!-- email-options -->
    <div class="emailcontent">
        <div class="list-group">


            <?php


            foreach ($models as $model) {

                ?>


                <div class="list-group-item unread">
                    <div class="list-left">
                        <label class="ckbox">
                            <input type="checkbox"><span></span>
                        </label>
                        <span class="markstar"><i class="glyphicon glyphicon-star"></i></span>
                    </div>
                    <div class="media" id="<?=$model->id?>"
                         data-id='<?=$model->id?>'
                         data-subject='<?=$model->subject?>'
                         data-docfile='<?=$model->listDownloadFiles('doc_file')?>'
                         data-attach-files='<?=$model->listDownloadFiles('attach_files')?>'
                         data-doc-to='<?=$model->to?>'>

                        <div class="media-body">
                            <span class="pull-right">1 hour ago</span>
                            <h5><?=$model->doc_no?> ลงวันที่ <?=Yii::$app->thai->thaidate('j F Y', strtotime($model->doc_date)); ?></h5>
                            <h5 class="media-heading"><i class="read-status fa fa-envelope" id="read-status<?=$model->id?>"></i> <?=$model->subject?></h5>

                        </div>
                        <p>
                            <i class="fa fa-user"></i> <?= isset($model->user_id) ? User::findIdentity($model->user_id)->getFullName():'' ?>
                        </p>

                    </div>
                </div>


                <?php
            }
            ?>
            <div style="padding-left: 15px">
            <?php
            // display pagination
            echo LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
                </div>
        </div>

    </div>
    <!-- emailcontent -->

    <div class="contentpanel emailpanel" id="doc-panel">
        <h3 class="nomail">No document selected</h3>


        <?php


        foreach ($models as $model) {

            ?>

            <div class="mailcontent hide" id="doc-content<?=$model->id?>" data-loaded="false"></div>

            <?php
        }
        ?>
        <!-- mailcontent -->
    </div>
</div>