<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 30/9/15
 * Time: 22:36
 */

use common\models\Profile;
use kartik\grid\GridView;
use yii\helpers\Url;

?>

<div class="email-header">
    <div class="pull-right">
        1 hour ago &nbsp;
        <div class="btn-group mr5">
            <button class="btn btn-default" type="button"><i class="fa fa-reply"></i></button>
            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button"
                    aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul role="menu" class="dropdown-menu dm-icon pull-right">
                <li><a href="#"><i class="fa fa-reply"></i> ตอบกลับหนังสือ</a></li>
                <li><a href="#"><i class="fa fa-arrow-right"></i> ทำหนังสือแจ้งเวียน</a></li>
                <li><a href="#"><i class="fa fa-print"></i> Print</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> ตีกลับ</a></li>

            </ul>
        </div>

        <div class="btn-group">
            <button class="btn btn-default" type="button"><i class="fa fa-angle-left"></i></button>
            <button class="btn btn-default" type="button"><i class="fa fa-angle-right"></i></button>
        </div>
    </div>
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object img-circle"
                     src="<?php echo $this->theme->baseUrl ?>/images/photos/user1.png" alt="">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?=Profile::getWorkgroup($model->from, false) ?></h4>
            to: <?=Profile::getWorkgroupNames($model->to, false) ?>
        </div>
    </div>
    <!-- media -->
</div>
<!-- email-header -->

<hr>

<h3 class="email-subject" id="doc-subject"><?=$model->subject?> <span
        class="markstar markstar<?=$model->id?>"><i class="glyphicon glyphicon-star"></i></span></h3>
<h4><?=$model->doc_no?> ลงวันที่ <?=Yii::$app->thai->thaidate('j F Y', strtotime($model->doc_date)); ?></h4>


<div class="email-body">
    <?php
        $url = $model->listFilesUrl('doc_file');
        $url = str_replace("&", "%26", $url);
        $url = str_replace("?", "%3F", $url);
    ?>

    <div id="preview<?=$model->id?>"> </div>
<!--    <iframe src="http://docs.google.com/gview?url=--><?//=$url?><!--&embedded=true" style="width:100%; height:400px;" frameborder="0"></iframe>-->


</div>
<br>

<h4 class="panel-title"><i class="glyphicon glyphicon-paperclip"></i> Attachments: </h4>
<button class="btn btn-default btn-xs pull-right" id="preview-button<?=$model->id?>">Live Preview</button><?=$model->listDownloadFiles('doc_file')?>
<hr class='nomargin'>
<?=$model->listDownloadFiles('attach_files')?>

<div style="height: 30px"></div>

<h4><i class="fa fa-paper-plane"></i> หน่วยงานผู้รับ</h4>
<?php
echo GridView::widget([
    'dataProvider'=> $dataProvider,
    //'filterModel' => $searchModel,
    'striped'=>false,
    'bordered'=>false,
    'export' => false,
    'showHeader' => true,
    'tableOptions' =>['class' => 'table-default'],
    //'sort'=> false,


    'columns' => [
        [
            'class'=>'kartik\grid\SerialColumn',

            'width'=>'36px',

        ],
        [
            'attribute'=>'หน่วยงานผู้รับ',
            'value'=>function ($model, $key, $index, $widget) {
                return Profile::getWorkgroup($model->to, false);
            },
            //'width'=>'8%',
            'format'=>'raw',

        ],

        [
            'attribute'=>'สถานะ',
            'value'=>function ($model, $key, $index, $widget) {
                return '<div id="ajax-result-status-'.$model->id.'-'.$model->to.'">'.$model->status.'</div>';
            },
            //'width'=>'8%',
            'format'=>'raw',

        ],
        [
            'attribute'=>'action',
            'value'=>function ($model, $key, $index, $widget) {
                return '<div class="btn-group">
    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#" onclick="doReceive('.$model->id.','.$model->to.');return false;">ลงรับ</a></li>
        <li><a href="#" onclick="doReject('.$model->id.','.$model->to.');return false;">ตีกลับ</a></li>
    </ul>
</div>';
            },
            //'width'=>'8%',
            'format'=>'raw',

        ],
        [
            'attribute'=>'ผู้ลงรับ',
            'value'=>function ($model, $key, $index, $widget) {
                return '<div id="ajax-result-received_by-'.$model->id.'-'.$model->to.'">'.$model->received_by.'</div>';
            },
            //'width'=>'8%',
            'format'=>'raw',

        ],
        [
            'attribute'=>'เลขที่ลงรับ',
            'value'=>function ($model, $key, $index, $widget) {
                return '<div id="ajax-result-received_no-'.$model->id.'-'.$model->to.'">'.$model->received_no.'</div>';
            },
            //'width'=>'8%',
            'format'=>'raw',

        ],
        [
            'attribute'=>'วันที่ลงรับ',
            'value'=>function ($model, $key, $index, $widget) {
                return '<div id="ajax-result-received_date-'.$model->id.'-'.$model->to.'">'.$model->received_date.'</div>';
            },
            //'width'=>'8%',
            'format'=>'raw',

        ],

    ],
    'responsive'=>true,
    'hover'=>true
]);
?>





<h4><i class="glyphicon glyphicon-comment"></i> Comments</h4>
<div class="panel-post-item">
    <div class="collapse in">
    <ul class="media-list">
        <li class="media">
            <div class="media-left">
                <a href="#">
                    <img class="media-object img-circle"
                         src="<?php echo $this->theme->baseUrl ?>/images/photos/user1.png" alt="">
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
                    <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user1.png" alt="">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Jennie S. Gray <small>5 minutes ago</small></h4>
                Nor again is there anyone who loves or pursues or desires to obtain pain of itself,
            </div>
        </li>
    </ul>
    </div>
</div>
<div class="form-group email-editor">
    <div id="summernote" style="display: none;">Reply</div>

</div>
<button class="btn btn-success">Send Message</button>
<button class="btn btn-default">Save as Draft</button>


<script type="text/javascript">
    $(document).ready(function() {
        $('.emailcontent input[type=checkbox]').click(function() {
            if($(this).is(':checked')) {
                $(this).closest('.list-group-item').addClass('selected');
            } else {
                $(this).closest('.list-group-item').removeClass('selected');
            }
        });

        $('#preview-button<?=$model->id?>').click(function() {
            var preview = $('#preview<?=$model->id?>');

            if (preview.html() == ' ') {
                preview.css("border", "#9FA8BC solid 1px");
                preview.animate({height:'400px'}, 500);
                preview.html('<iframe src="https://docs.google.com/gview?url=<?=$url?>&embedded=true" style="width:100%; height:100%;" frameborder="0"></iframe>');
            } else {
                preview.animate({height:'0px'}, 500);
                preview.html(' ');
                preview.css("border", "#9FA8BC solid 0px");
            }

        });

        // Mark a star
        $('.markstar<?=$model->id?>').click(function() {
            if($(this).hasClass('starred')) {
                $(this).removeClass('starred');
            } else {
                $(this).addClass('starred');
            }
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



</script>