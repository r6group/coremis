<?php

use kartik\sidenav\SideNav;
use yii\helpers\Url;
use backoffice\modules\user\User;

$items = [];



if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
    array_push($items, [
        'label'  => 'ตั้งค่าการใช้งาน',
        'url'    => Url::toRoute(['index']),
        'active' => (Url::to('') == Url::to(['index'])),
        'icon' => 'fa fa-cog'
    ]);
}


array_push($items, [
    'label' => 'ข้อมูลส่วนบุคคล',
    'url'   => Url::toRoute(['profile']),
    'active' => (Url::to('') == Url::to(['profile'])),
    'icon' => 'fa fa-user'
]);

    if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin')) {
        array_push($items, [
            'label' => 'กำหนด Admin สนย.',
            'url' => Url::toRoute(['kpi-admin']),
            'active' => (Url::to('') == Url::to(['kpi-admin'])),
            'icon' => 'fa fa-users'
        ]);
    }


if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
    array_push($items, [
        'label' => 'กำหนดผู้ สร้าง/แก้ไข รายละเอียด KPI',
        'url'   => Url::toRoute(['kpi-editor']),
        'active' => (Url::to('') == Url::to(['kpi-editor'])),
        'icon' => 'fa fa-users'
    ]);
}

if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
    array_push($items, [
        'label' => 'กำหนดผู้ Admin กรม',
        'url'   => Url::toRoute(['kpi-admin-moph']),
        'active' => (Url::to('') == Url::to(['kpi-admin-moph'])),
        'icon' => 'fa fa-users'
    ]);
}

if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
    array_push($items, [
        'label' => 'กำหนด Admin เขตสุขภาพ',
        'url'   => Url::toRoute(['kpi-admin-region']),
        'active' => (Url::to('') == Url::to(['kpi-admin-region'])),
        'icon' => 'fa fa-users'
    ]);
}


if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
    array_push($items, [
        'label' => 'กำหนด Admin สสจ.',
        'url'   => Url::toRoute(['kpi-admin-province']),
        'active' => (Url::to('') == Url::to(['kpi-admin-province'])),
        'icon' => 'fa fa-users'
    ]);
}

if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-admin-province')) {
    array_push($items, [
        'label' => 'กำหนด Admin สสอ.',
        'url'   => Url::toRoute(['kpi-admin-district']),
        'active' => (Url::to('') == Url::to(['kpi-admin-district'])),
        'icon' => 'fa fa-users'
    ]);
}


if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-admin-province') || \Yii::$app->user->can('kpi-admin-district')) {
    array_push($items, [
        'label' => 'กำหนด Admin รพ./รพ.สต.',
        'url'   => Url::toRoute(['kpi-admin-hospital']),
        'active' => (Url::to('') == Url::to(['kpi-admin-hospital'])),
        'icon' => 'fa fa-users'
    ]);
}


if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-admin-province') || \Yii::$app->user->can('kpi-admin-district') || \Yii::$app->user->can('kpi-admin-hospital')) {
    array_push($items, [
        'label' => 'กำหนดผู้รายงานผลตัวชี้วัด',
        'url'   => Url::toRoute(['kpi-reporter']),
        'active' => ((Url::to('') == Url::to(['kpi-reporter'])) || (Url::to('') == Url::to(['assign-reporter']))),
        'icon' => 'fa fa-users'
    ]);
}


if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-admin-province') || \Yii::$app->user->can('kpi-admin-district') || \Yii::$app->user->can('kpi-admin-hospital') || \Yii::$app->user->can('kpi-reporter')) {
    array_push($items, [
        'label' => 'รายงานผลตัวชี้วัด',
        'url'   => Url::toRoute(['kpi-report']),
        'active' => ((Url::to('') == Url::to(['kpi-report'])) || (Url::to('') == Url::to(['assign-reporter']))),
        'icon' => 'fa fa-users'
    ]);
}


if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-admin-province') || \Yii::$app->user->can('kpi-admin-district') || \Yii::$app->user->can('kpi-admin-hospital')) {
    array_push($items, [
        'label' => 'Upload รายงานผลตัวชี้วัด',
        'url'   => Url::toRoute(['kpi-upload']),
        'active' => (Url::to('') == Url::to(['kpi-upload'])),
        'icon' => 'fa fa-upload'
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