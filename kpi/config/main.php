<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-kpi',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'kpi\controllers',
    'bootstrap' => ['log'],
    'name' => 'ระบบติดตามผลการปฏิบัติราชการ กระทรวงสาธารณสุข',
    'modules' => [
        'gridview' => [
            'class' => 'kartik\grid\Module',
        ],
 
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'rules' => [
                //'' => 'site/index',
                //'gii' => 'gii',
                'debug/<controller>/<action>' => 'debug/<controller>/<action>',
                '<_a:(about|contact|captcha|login|signup)>' => 'site/<_a>',
                '<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>',
                '<_m>/<_c>' => '<_m>/<_c>',
                '<_m>' => '<_m>',
            ]
        ],
    ],
    'params' => $params,
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'kpi-list/*',
            'kpi/*',
            'setting/*',
            'pdfjs/*',
            'my-kpi/*',
            'kpi-sum/*',
            'debug/default*',
            'kpi-group/*',
            'gii/*',
            'hdc-s-table/*',
        ]
    ],

];
