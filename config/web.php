<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'arranger',
    'name' => 'Arranger',
    'defaultRoute' => 'main/default/index',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    // all site modules
    'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ]
            ],
        ]
    ],

    'components' => [
        'language' => 'ru-RU',
        'request' => [
            'class' => 'app\components\LangRequest',
            // site root directory
            'baseUrl' => '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'pLhHmzI5xBgQund7UfxwX215QMA4gTvY',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class' => 'app\components\LangUrlManager',
            'rules' => [
                'index' => 'main/default/index',
                'events' => 'main/default/events',
                'sheet-music' => 'main/default/sheet-music',
                'jingles' => 'main/default/jingles',
                'stems' => 'main/default/stems',
                'projects' => 'main/default/projects',
                'publications' => 'main/default/publications',
                'contact' => 'main/default/contact',
                'sing-in' => 'main/default/sing-in',
                '/user/<_u:(profile|biography|update-profile|update-biography|update-password)>' => 'admin/user/<_u>',
                '/events/<_ev:(list|create)>' => 'admin/events/<_ev>',
                '/events/<_ev:(view|update|delete)>/<id:\d+>' => 'admin/events/<_ev>',
                '/sheet-music/<_sm:(list|create)>' => 'admin/sheet-music/<_sm>',
                '/sheet-music/<_sm:(view|update|delete|pdf)>/<id:\d+>' => 'admin/sheet-music/<_sm>',
                '/music-tracks/<_mt:(list|create)>' => 'admin/music-tracks/<_mt>',
                '/music-tracks/<_mt:(view|update|delete)>/<id:\d+>' => 'admin/music-tracks/<_mt>',
                '/projects/<_pr:(list|create)>' => 'admin/projects/<_pr>',
                '/projects/<_pr:(view|update|delete)>/<id:\d+>' => 'admin/projects/<_pr>',
                '/publications/<_pb:(list|create)>' => 'admin/publications/<_pb>',
                '/publications/<_pb:(view|update|delete)>/<id:\d+>' => 'admin/publications/<_pb>',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\admin\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['main/default/sing-in'],
        ],
        'errorHandler' => [
            'errorAction' => 'main/default/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'forceTranslation' => true,
                    'sourceLanguage' => 'en-US',
                ],
            ],
        ],
        'formatter' => [
            'datetimeFormat' => 'dd.MM.Y HH:mm',
            'timeZone' => 'UTC',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;