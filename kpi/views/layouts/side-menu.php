<?php

use kartik\sidenav\SideNav;
use yii\helpers\Url;
use backoffice\modules\user\User;

$items = [];


// || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')
if (\Yii::$app->user->can('superadmin')) {
    array_push($items, [
        'label'  => 'ตั้งค่าการใช้งาน',
        'url'    => Url::toRoute(['/setting/index']),
        'active' => (Url::to('') == Url::to(['/setting/index'])),
        'icon' => 'fa fa-cog'
    ]);
}


array_push($items, [
    'label' => 'ข้อมูลส่วนบุคคล',
    'url'   => Url::toRoute(['/setting/profile']),
    'active' => (Url::to('') == Url::to(['profile'])),
    'icon' => 'fa fa-user'
]);

if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-editor')) {
    array_push($items, [
        'label' => 'KPI Template กระทรวงสาธารณสุข',
        'url'   => Url::toRoute(['/kpi-list/index']),
        'active' => (Url::to('') == Url::to(['/kpi-list/index'])) || (Url::to('') == Url::to(['/kpi-list/create'])) || (Url::to('') == Url::to(['/kpi-list/update'])),
        'icon' => 'fa fa-dashboard fa-fw'
    ]);
}




array_push($items, [
    'label' => 'My KPI Dashboard',
    'url'   => Url::toRoute(['/kpi-group/index']),
    'active' => (Url::to('') == Url::to(['/kpi-group/index'])) || (Url::to('') == Url::to(['/kpi-group/create'])) || (Url::to('') == Url::to(['/kpi-group/update'])),
    'icon' => 'fa fa-dashboard fa-fw'
]);


    if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin')) {
        array_push($items, [
            'label' => 'กำหนด Admin ระบบ KPI สธ.',
            'url' => Url::toRoute(['/setting/kpi-admin']),
            'active' => (Url::to('') == Url::to(['kpi-admin'])),
            'icon' => 'fa fa-users'
        ]);
    }



if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
    array_push($items, [
        'label' => 'กำหนดผู้ สร้าง/แก้ไข รายละเอียด KPI',
        'url'   => Url::toRoute(['/setting/kpi-editor']),
        'active' => (Url::to('') == Url::to(['kpi-editor'])),
        'icon' => 'fa fa-users'
    ]);
}


if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
    array_push($items, [
        'label' => 'กำหนด Admin สนย.',
        'url' => Url::toRoute(['/setting/kpi-admin-bps']),
        'active' => (Url::to('') == Url::to(['kpi-admin-bps'])),
        'icon' => 'fa fa-users'
    ]);
}


if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
    array_push($items, [
        'label' => 'กำหนด Admin กรม',
        'url'   => Url::toRoute(['/setting/kpi-admin-moph']),
        'active' => (Url::to('') == Url::to(['kpi-admin-moph'])),
        'icon' => 'fa fa-users'
    ]);
}

if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
    array_push($items, [
        'label' => 'กำหนด Admin เขตสุขภาพ',
        'url'   => Url::toRoute(['/setting/kpi-admin-region']),
        'active' => (Url::to('') == Url::to(['kpi-admin-region'])),
        'icon' => 'fa fa-users'
    ]);
}


if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
    array_push($items, [
        'label' => 'กำหนด Admin สสจ.',
        'url'   => Url::toRoute(['/setting/kpi-admin-province']),
        'active' => (Url::to('') == Url::to(['kpi-admin-province'])),
        'icon' => 'fa fa-users'
    ]);
}

if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-admin-province')) {
    array_push($items, [
        'label' => 'กำหนด Admin สสอ.',
        'url'   => Url::toRoute(['/setting/kpi-admin-district']),
        'active' => (Url::to('') == Url::to(['kpi-admin-district'])),
        'icon' => 'fa fa-users'
    ]);
}


if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-admin-province') || \Yii::$app->user->can('kpi-admin-district')) {
    array_push($items, [
        'label' => 'กำหนด Admin รพ.',
        'url'   => Url::toRoute(['/setting/kpi-admin-hospital']),
        'active' => (Url::to('') == Url::to(['kpi-admin-hospital'])),
        'icon' => 'fa fa-users'
    ]);
}


if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin-moph') || \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-admin-bps') || \Yii::$app->user->can('kpi-admin-region') || \Yii::$app->user->can('kpi-admin-province') || \Yii::$app->user->can('kpi-admin-district') || \Yii::$app->user->can('kpi-admin-hospital')) {
    array_push($items, [
        'label' => 'กำหนดผู้รายงานผลตัวชี้วัด',
        'url'   => Url::toRoute(['/setting/kpi-reporter']),
        'active' => ((Url::to('') == Url::to(['kpi-reporter'])) || (Url::to('') == Url::to(['assign-reporter']))),
        'icon' => 'fa fa-users'
    ]);
}


if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin-moph') || \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-admin-bps') || \Yii::$app->user->can('kpi-admin-region') || \Yii::$app->user->can('kpi-admin-province') || \Yii::$app->user->can('kpi-admin-district') || \Yii::$app->user->can('kpi-admin-hospital') || \Yii::$app->user->can('kpi-reporter')) {
    array_push($items, [
        'label' => 'รายงานผลตัวชี้วัด',
        'url'   => Url::toRoute(['/setting/kpi-report']),
        'active' => ((Url::to('') == Url::to(['kpi-report'])) || (Url::to('') == Url::to(['assign-reporter']))),
        'icon' => 'fa fa-edit'
    ]);
}


if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin-moph') || \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-admin-bps') || \Yii::$app->user->can('kpi-admin-region') || \Yii::$app->user->can('kpi-admin-province') || \Yii::$app->user->can('kpi-admin-district') || \Yii::$app->user->can('kpi-admin-hospital')) {
    array_push($items, [
        'label' => 'Upload รายงานผลตัวชี้วัด',
        'url'   => Url::toRoute(['/setting/kpi-upload']),
        'active' => (Url::to('') == Url::to(['kpi-upload'])),
        'icon' => 'fa fa-upload'
    ]);
}

if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
    array_push($items, [
        'label' => 'นำเข้า HDC Web Service',
        'url' => Url::toRoute(['/hdc-s-table/index']),
        'active' => (Url::to('') == Url::to(['/hdc-s-table/index'])),
        'icon' => 'fa fa-cloud-download'
    ]);
}


echo SideNav::widget(
        [
            'heading' => 'Setting',
            'type' => SideNav::TYPE_DEFAULT,
            'items'   => $items,
            'activeCssClass' => 'active',
            'iconPrefix' => ''
        ]
);