<?php

/* @var $this yii\web\View */
use yii\helpers\Url;


$this->title = 'Smart Office';
$this->params['hide_footer'][] = true;

$this->registerCssFile(Url::to('@web/themes/quirk/lib/summernote/summernote.css'));
//$this->registerCssFile(Url::to('@web/themes/quirk/lib/weather-icons/css/weather-icons.css'));

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

    $(this).parent().addClass('active').removeClass('unread');
    $('.nomail').addClass('hide');
    $('.mailcontent').removeClass('hide');
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
            <a href="" class="tooltips" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Archive"><i class="fa fa-archive"></i></a>
            <a href="" class="tooltips" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Report Spam"><i class="fa fa-exclamation-triangle"></i></a>
            <a href="" class="tooltips" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Move to Folder"><i class="fa fa-folder-open"></i></a>
            <a href="" class="tooltips" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Tag"><i class="fa fa-tag"></i></a>
            <a href="" class="tooltips" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Move to Trash"><i class="fa fa-trash"></i></a>
            <a href="" class="tooltips" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More"><i class="fa fa-ellipsis-v"></i></a>
        </div>

        <label class="ckbox">
            <input type="checkbox"><span></span>
        </label>
    </div><!-- email-options -->
    <div class="emailcontent">

        <div class="list-group">
            <div class="list-group-item unread">
                <div class="list-left">
                    <label class="ckbox">
                        <input type="checkbox"><span></span>
                    </label>
                    <span class="markstar"><i class="glyphicon glyphicon-star"></i></span>
                </div>
                <div class="media">

                    <div class="media-body">
                        <span class="pull-right">1 hour ago</span>
                        <h5 class="media-heading">สำนักนโยบายและยุทธศาสตร์</h5>
                        <h5>สธ 00349.3/875 ลงวันที่ 23 ส.ค. 58</h5>
                    </div>
                    <p>คำสั่งแต่งตั้งคณะกรรมการตรวจสอบข้อเท็จจริง ของสำนักงานสาธารณสุขจังหวัดสระแก้ว</p>
                </div>
            </div>
            <div class="list-group-item unread">
                <div class="list-left">
                    <label class="ckbox">
                        <input type="checkbox"><span></span>
                    </label>
                    <span class="markstar"><i class="glyphicon glyphicon-star"></i></span>
                    <span class="attachment"><i class="fa fa-paperclip"></i></span>
                </div>
                <div class="media">

                    <div class="media-body">
                        <span class="pull-right">2 hours ago</span>
                        <h5 class="media-heading">Floyd M. Romero</h5>
                        <h5>What every small business needs to...</h5>
                    </div>
                    <p>Running a small business means having a million things on your plate at once. We totally get it and..</p>
                </div>
            </div>
            <div class="list-group-item unread">
                <div class="list-left">
                    <label class="ckbox">
                        <input type="checkbox"><span></span>
                    </label>
                    <span class="markstar starred"><i class="glyphicon glyphicon-star"></i></span>
                </div>
                <div class="media">

                    <div class="media-body">
                        <span class="pull-right">1 day ago</span>
                        <h5 class="media-heading">Jennie S. Gray</h5>
                        <h5>Your Account Balance $26,184.00</h5>
                    </div>
                    <p>Your new commission account can now have up to $26,184.00. You were approved for the amount...</p>
                </div>
            </div>
            <div class="list-group-item">
                <div class="list-left">
                    <label class="ckbox">
                        <input type="checkbox"><span></span>
                    </label>
                    <span class="markstar"><i class="glyphicon glyphicon-star"></i></span>
                    <span class="attachment"><i class="fa fa-paperclip"></i></span>
                </div>
                <div class="media">

                    <div class="media-body">
                        <span class="pull-right">1 day ago</span>
                        <h5 class="media-heading">Alia J. Locher</h5>
                        <h5>Enterprise Network Monitoring 2.0</h5>
                    </div>
                    <p>These technologies will contain, by definition, a level of insight about how the network is operating that...</p>
                </div>
            </div>
            <div class="list-group-item">
                <div class="list-left">
                    <label class="ckbox">
                        <input type="checkbox"><span></span>
                    </label>
                    <span class="markstar"><i class="glyphicon glyphicon-star"></i></span>
                    <span class="attachment"><i class="fa fa-paperclip"></i></span>
                </div>
                <div class="media">

                    <div class="media-body">
                        <span class="pull-right">1 day ago</span>
                        <h5 class="media-heading">Nicholas T. Hinkle</h5>
                        <h5>Google Promises To Increase Adse..</h5>
                    </div>
                    <p>Google announced on Monday that it is increasing the transparency of AdSense payments in that it will start...</p>
                </div>
            </div>
            <div class="list-group-item">
                <div class="list-left">
                    <label class="ckbox">
                        <input type="checkbox"><span></span>
                    </label>
                    <span class="markstar"><i class="glyphicon glyphicon-star"></i></span>
                </div>
                <div class="media">

                    <div class="media-body">
                        <span class="pull-right">2 days ago</span>
                        <h5 class="media-heading">Jamie W. Bradford</h5>
                        <h5>Get Paid for Your Stuff with a Gift Card</h5>
                    </div>
                    <p>Hi Elen, It's easy to get paid for your unwanted stuff. If you're done with an item simply click Trade in, ship...</p>
                </div>
            </div>
            <div class="list-group-item">
                <div class="list-left">
                    <label class="ckbox">
                        <input type="checkbox"><span></span>
                    </label>
                    <span class="markstar"><i class="glyphicon glyphicon-star"></i></span>
                </div>
                <div class="media">

                    <div class="media-body">
                        <span class="pull-right">4 days ago</span>
                        <h5 class="media-heading">Pamela J. Stump</h5>
                        <h5>Is your ideal vacation is in San Francisco</h5>
                    </div>
                    <p>Hi Elen, Find rentals with everything you need in these top places. Millions of reviews to help you plan...</p>
                </div>
            </div>
            <div class="list-group-item">
                <div class="list-left">
                    <label class="ckbox">
                        <input type="checkbox"><span></span>
                    </label>
                    <span class="markstar"><i class="glyphicon glyphicon-star"></i></span>
                </div>
                <div class="media">

                    <div class="media-body">
                        <span class="pull-right">4 days ago</span>
                        <h5 class="media-heading">Refugeo C. Burgess</h5>
                        <h5>Reminder: Freelancer mid-year giveaway</h5>
                    </div>
                    <p>Hi Elen, With only 8 days left until we reach the midway point of 2015 - things are getting really busy!...</p>
                </div>
            </div>
            <div class="list-group-item">
                <div class="list-left">
                    <label class="ckbox">
                        <input type="checkbox"><span></span>
                    </label>
                    <span class="markstar"><i class="glyphicon glyphicon-star"></i></span>
                </div>
                <div class="media">

                    <div class="media-body">
                        <span class="pull-right">10 days ago</span>
                        <h5 class="media-heading">Ashley T. Brewington</h5>
                        <h5>It's almost weekend, you ready to relax?</h5>
                    </div>
                    <p>Hi Elen, It's almost the weekend and it's time for you to sit back and relax. But wouldn't it be great if you...</p>
                </div>
            </div>
            <div class="list-group-item">
                <div class="list-left">
                    <label class="ckbox">
                        <input type="checkbox"><span></span>
                    </label>
                    <span class="markstar"><i class="glyphicon glyphicon-star"></i></span>
                    <span class="attachment"><i class="fa fa-paperclip"></i></span>
                </div>
                <div class="media">

                    <div class="media-body">
                        <span class="pull-right">12 days ago</span>
                        <h5 class="media-heading">Roberta F. Horn</h5>
                        <h5>You have until June to redeem fuel!</h5>
                    </div>
                    <p>Hi Elen, Redeem your points for fuel vouchers. This is a limited offer and promo is until June 30 only. For...</p>
                </div>
            </div>
        </div>

    </div><!-- emailcontent -->

    <div class="contentpanel emailpanel">
        <h3 class="nomail">No mail selected</h3>
        <div class="mailcontent hide">
            <div class="email-header">
                <div class="pull-right">
                    1 hour ago &nbsp;
                    <div class="btn-group mr5">
                        <button class="btn btn-default" type="button"><i class="fa fa-reply"></i></button>
                        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul role="menu" class="dropdown-menu dm-icon pull-right">
                            <li><a href="#"><i class="fa fa-reply-all"></i> Reply to All</a></li>
                            <li><a href="#"><i class="fa fa-arrow-right"></i> Foward</a></li>
                            <li><a href="#"><i class="fa fa-print"></i> Print</a></li>
                            <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Report Spam</a></li>
                            <li><a href="#"><i class="fa fa-trash"></i> Delete Message</a></li>
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
                            <img class="media-object img-circle" src="<?php echo $this->theme->baseUrl ?>/images/photos/user1.png" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Christina R. Hill</h4>
                        to: me, Floyd, Alia, Nicholas
                    </div>
                </div><!-- media -->
            </div><!-- email-header -->

            <hr>

            <h3 class="email-subject">Envato Market: Your request for all earnings has been calculated <span class="markstar"><i class="glyphicon glyphicon-star"></i></span></h3>
            <div class="email-body">
                <p>Hi Elen,</p>
                <p>Your request to withdraw all earnings up until the end of May 2015 has been calculated.</p>
                <p>Children of the sun, see your time has just begun, searching for your ways, through adventures every day. Every day and night, with the condor in flight, with all your friends in tow, you search for the Cities of Gold. Ah-ah-ah-ah-ah... wishing for The Cities of Gold. Ah-ah-ah-ah-ah... some day we will find The Cities of Gold. Do-do-do-do ah-ah-ah, do-do-do-do, Cities of Gold. Do-do-do-do, Cities of Gold. Ah-ah-ah-ah-ah... some day we will find The Cities of Gold.</p>
                <p>Thunder, thunder, thundercats, Ho! Thundercats are on the move, Thundercats are loose. Feel the magic, hear the roar, Thundercats are loose. Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thundercats!</p>
                <blockquote>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</blockquote>
                <p>Mutley, you snickering, floppy eared hound. When courage is needed, you're never around. Those medals you wear on your moth-eaten chest should be there for bungling at which you are best. So, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon. Howwww! Nab him, jab him, tab him, grab him, stop that pigeon now.</p>

            </div>

            <br>
            <hr>

            <h4 class="panel-title">Attachments:</h4>
            <ul class="list-unstyled list-attachments">
                <li><i class="fa fa-file-pdf-o"></i> <a href="">Template_Documentation.pdf</a></li>
                <li><i class="fa fa-file-pdf-o"></i> <a href="">Template_Documentation.pdf</a></li>
            </ul>

            <hr>

            <div class="form-group email-editor">
                <div id="summernote" style="display: none;">Reply</div>
            <button class="btn btn-success">Send Message</button>
            <button class="btn btn-default">Save as Draft</button>

            <br><br>


        </div><!-- mailcontent -->
    </div><!-- contentpanel -->

</div>