<?php

return [
    'id' => 'main',
    'name' => $_SERVER['SERVER_NAME'],
    'charset' => 'UTF-8',
    'sourceLanguage' => 'en-US',
    'language' => 'ru-RU',
    'basePath' => FILE_PATH_ROOT,
    'bootstrap' => ['log', 'debug'],
    'params' => require(FILE_PATH_CONFIG_ENV . '_param.php'),
    'defaultRoute' => 'index/index',
    'components' => [
        'db' => require(FILE_PATH_CONFIG_ENV . '_db.php'),
        'request' => [
            'cookieValidationKey' => '1KjHfY5yyez5kXpe4lty_zre_4dXCePE',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require(FILE_PATH_CONFIG_ENV . '_routes.php')
        ],
        'user' => [
            'class' => 'app\components\UserExtended',
            'identityClass' => 'app\components\UserIdentity',
            'enableAutoLogin' => true,
            'loginUrl' => ['auth/login']
        ],
        'authManager' => require(FILE_PATH_CONFIG_ENV . '_auth.php'),
        'errorHandler' => [
            'errorAction' => 'error/show',
        ],
        'view' => [
            'class' => 'app\components\ViewExtended'
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => FILE_PATH_ROOT . 'messages',
                    'fileMap' => [
                        '' => 'main.php',
                        'main' => 'main.php'
                    ]
                ]
            ]
        ],
//        'mailer' => [
//            'class' => 'yii\swiftmailer\Mailer',
//            // send all mails to a file by default. You have to set
//            // 'useFileTransport' to false and configure a transport
//            // for the mailer to send real emails.
//            'useFileTransport' => true,
//        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                ['class' => 'yii\log\FileTarget', 'levels' => ['error', 'warning']]
            ]
        ]
    ],
    'modules' => require(FILE_PATH_CONFIG_ENV . '_modules.php')
];