<?php

use kartik\sidenav\SideNav;
use yii\helpers\Url;
use team\modules\user\User;

$cat_id = Yii::$app->request->getQueryParams(['ContentSearch[cat_id]']);

is_array($cat_id) ? isset($cat_id['ContentSearch']['cat_id']) ? $cat_id = $cat_id['ContentSearch']['cat_id'] : $cat_id = '' : $cat_id = '';

$items = [
    [
        'label'  => 'ข่าวประชาสัมพันธ์กิจกรรมบริการ',
        'url'    => Url::toRoute(['/content', 'ContentSearch[cat_id]'=>2]),
        'active' => $cat_id == 2,
        'icon' => 'list'
    ],
    [
        'label'  => 'การดำเนินงานด้านสาธารณสุข',
        'url'    => Url::toRoute(['/content', 'ContentSearch[cat_id]'=>17]),
        'active' => $cat_id == 17,
        'icon' => 'list'
    ],

    [
        'label' => 'รับสมัครงาน',
        'url'   => Url::toRoute(['/content', 'ContentSearch[cat_id]'=>3]),
        'active' => $cat_id == 3,
        'icon' => 'list'
    ],
    [
        'label' => 'รับสมัครนักเรียนทุน',
        'url'   => Url::toRoute(['/content', 'ContentSearch[cat_id]'=>4]),
        'active' => $cat_id == 4,
        'icon' => 'list'
    ],
    [
        'label' => 'ข่าวประกวดราคา',
        'url'   => Url::toRoute(['/content', 'ContentSearch[cat_id]'=>5]),
        'active' => $cat_id == 5,
        'icon' => 'list'
    ],
];


echo SideNav::widget(
        [
            //'heading' => 'Nav',
            //'type' => SideNav::TYPE_PRIMARY,
            'items'   => $items,
            'activeCssClass' => 'active'
        ]
);