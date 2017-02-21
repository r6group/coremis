<?php

use kartik\sidenav\SideNav;
use yii\helpers\Url;
use backoffice\modules\user\User;

$items = [
    [
        'label'  => 'บุคลากรทางการแพทย์และสุขภาพ',
        'url'    => Url::toRoute(['/hrm/default/report']),
        'active' => (Url::to('') == Url::to(['/hrm/default/report'])),
        'icon' => 'fa fa-stethoscope',

    ],
    [
        'label' => 'แพทย์เฉพาะทาง',
        'url'   => Url::toRoute(['/hrm/default/report-special']),
        'active' => (Url::to('') == Url::to(['/hrm/default/report-special'])),
        'icon' => 'fa fa-user-md'
    ],
    [
        'label' => 'ครุภัณฑ์ทางการแพทย์',
        'url'   => Url::toRoute(['/hrm/health-items/index']),
        'active' => (Url::to('') == Url::to(['/hrm/health-items/index'])),
        'icon' => 'fa fa-ambulance'
    ],
];


echo SideNav::widget(
    [
        'heading' => 'รายงานด้านทรัพยากรสุขภาพ',
        'type' => SideNav::TYPE_PRIMARY,
        'items'   => $items,
        'activeCssClass' => 'active',
        'iconPrefix' => ''
    ]
);