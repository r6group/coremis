<?php
use \kartik\datecontrol\Module;
use \yii\caching\MemCache;

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>'th',
    'components' => [
        'session' => [
            'class' => 'yii\web\DbSession',

            // Set the following if you want to use DB component other than
            // default 'db'.
            // 'db' => 'mydb',

            // To override default session table, set the following
            // 'sessionTable' => 'my_session',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'cache' => [
//            'class' => 'yii\caching\MemCache',
//            'servers' => [
//                [
//                    'host' => '127.0.0.1',
//                    'port' => 11211,
//                ],
//            ],
//            'useMemcached' => true,
//            'serializer' => false,
//            'options' => [
//                \Memcached::OPT_COMPRESSION => false,
//            ],
//
//        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
//            'cache' => 'cache',
            'defaultRoles' => [
                'guest'
            ],
        ],

        'config' => [
            'class' => 'common\components\DConfig',
        ],
        'thai' => [

            'class' => 'common\components\ThaiHelper',

        ],
    ],
    'modules' => [
        'request-log' => [
            'class' => Zelenin\yii\modules\RequestLog\Module::className(),
            // username attribute in your identity class (User)
            'usernameAttribute' => 'email'
        ],
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
            // other module settings, refer detailed documentation
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',

            //'language'=> 'th',

            // format settings for displaying each date attribute
            'displaySettings' => [
                'date' => 'd MMMM yyyy',
                'time' => 'hh:mm:ss',
                'datetime' => 'dd MMMM yyyy hh:mm:ss',
            ],


            // format settings for saving each date attribute
            'saveSettings' => [
                'date' => 'php:Y-m-d',
                'time' => 'php:H:i:s',
                'datetime' => 'php:Y-m-d H:i:s',
            ],

            // set your display timezone
            'displayTimezone' => 'Asia/Bangkok',

            // set your timezone for date saved to db
            'saveTimezone' => 'Asia/Bangkok',
            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,

            'autoWidgetSettings' => [
                Module::FORMAT_DATE => ['type'=>2, 'pluginOptions'=>['autoclose'=>true]], // example
                Module::FORMAT_DATETIME => [], // setup if needed
                Module::FORMAT_TIME => [], // setup if needed
            ],

        ],


    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'debug/default*',
            'datacontrol/parse/*',

        ]
    ],


];

