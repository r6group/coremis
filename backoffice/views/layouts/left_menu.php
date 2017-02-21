<?php

use yii\helpers\Url;
use common\models\Profile;

$profile = 0;
if (!\Yii::$app->user->isGuest) {
    $profile = Profile::findOne(['user_id' => Yii::$app->user->identity->getId()])->id;
}





function isActive($path, $math_all = false) {
    $param_r = Url::current();
//    echo $param_r.'<br>';
//    echo $path.'<br>';

    if ($math_all == true) {
        return ($param_r == $path) ? ' active' : '';
    } else {
        return (strpos($param_r, $path) == true) ? ' active' : '';
    }

}
?>

<ul class="nav nav-pills nav-stacked nav-quirk">
    <li class="<?=isActive('work/index/', true)?>"><a href="<?= Url::to(['/site/index']); ?>"><i class="fa fa-home"></i><span>Home</span></a></li>

    <li class="nav-parent<?=isActive('saraban/')?>">
        <a href=""><i class="fa fa-file-text"></i><span>สารบรรณ</span> <span class="badge badge-info">21</span></a>
        <ul class="children">
            <li><a href="#">#</a></li>
        </ul>
    </li>
    <li class="nav-parent<?=isActive('hrm/workgroup')?><?=isActive('hrm/default')?>">
        <a href=""><i class="fa fa-users"></i><span>บุคลากร</span></a>
        <ul class="children">
            <li class="<?=isActive('hrm/default/view')?>"><a href="<?= Url::toRoute(['/hrm/default/view', 'id'=> $profile]); ?>">ข้อมูลของฉัน</a></li>
            <li class="<?=isActive('hrm/default/index')?>"><a href="<?= Url::toRoute('/hrm/default/index'); ?>">ค้นหาบุคลากร</a></li>
            <li class="<?=isActive('hrm/workgroup/index')?>"><a href="<?= Url::toRoute('/hrm/workgroup/index'); ?>">โครงสร้างองค์กร</a></li>
            <li class="<?=isActive('hrm/default/report')?>"><a href="<?= Url::toRoute('/hrm/default/report'); ?>">ข้อมูลทรัพยากรสาธารณสุข</a></li>
        </ul>
    </li>

    <li class="nav-parent<?=isActive('hrm/health-items/')?>"><a href=""><i class="fa fa-ambulance"></i><span>พัสดุ-ครุภัณฑ์</span></a>
        <ul class="children">
            <li class="<?=isActive('hrm/health-items/index')?>"><a href="<?= Url::toRoute('/hrm/health-items/index'); ?>">ครุภันฑ์ทางการแพทย์</a></li>

        </ul>
    </li>

    <li class="nav-parent"><a href=""><i class="fa fa-money"></i><span>งบประมาณ/การเงิน</span></a>
        <ul class="children">
            <li><a href="#">#</a></li>
        </ul>
    </li>


    <li class="nav-parent"><a href=""><i class="fa fa-dot-circle-o"></i><span>ควบคุมภายใน</span></a>
        <ul class="children">
            <li><a href="#">#</a></li>
        </ul>
    </li>
    <li class="nav-parent"><a href=""><i class="fa fa-tasks"></i><span>แผนงาน</span></a>
        <ul class="children">
            <li><a href="#">#</a></li>
        </ul>
    </li>
    <li class="nav-parent"><a href=""><i class="fa fa-dashboard"></i><span>KPI</span></a>
        <ul class="children">
            <li><a href="#">#</a></li>
        </ul>
    </li>
</ul>