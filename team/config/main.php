<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-team',
    'basePath' => dirname(__DIR__),
    'name' => 'สำนักงานสาธารณสุขจังหวัดสระแก้ว',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'team\controllers',
    'modules' => [
        'sample' => [
            'class' => 'app\modules\sample\Sample',
        ],
        'cabinet' => [
            'class' => 'team\modules\user\User',
        ],
        'hrm' => [
            'class' => 'app\modules\hrm\Hrm',
        ],
        'saraban' => [
            'class' => 'app\modules\saraban\Module',
        ],
        'attachments' => [
            'class' => nemmo\attachments\Module::className(),
            'tempPath' => '@app/uploads/temp',
            'storePath' => '@app/uploads/store',
            'rules' => [ // Rules according to the FileValidator
                'maxFiles' => 10, // Allow to upload maximum 3 files, default to 3
                //'mimeTypes' => 'image/png', // Only png images //application/pdf
                'maxSize' => 1024 * 10240 // 1 MB
            ],
            'tableName' => '{{%attachments}}' // Optional, default to 'attach_file'
        ]
    ],
    'components' => [
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => 'theme/vendor/bootstrap/',
                    'js' => ['js/bootstrap.min.js']
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'on afterLogin' => function (\yii\web\UserEvent $event) {
                /** @var common\models\User $user */
                $user = $event->identity;
                $user->changeUserStatusNewToActive();
            }
        ],
        'urlManager' => [
            'rules' => [
                //'' => 'site/index',
                //'gii' => 'gii',
                '<_a:(about|contact|captcha|login|signup)>' => 'site/<_a>',
                '<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>',
                '<_m>/<_c>' => '<_m>/<_c>',
                '<_m>' => '<_m>',
            ]
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
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'content/index',
            'content/index-law',
            'content/view',
            'debug/default*',
        ]
    ],
    'params' => $params,
];
