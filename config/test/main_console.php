<?php

return [
    'id' => 'main-console',
    'basePath' => FILE_PATH_ROOT,
    'bootstrap' => ['log', 'gii'],
    'params' => require(FILE_PATH_CONFIG_ENV . '_param.php'),
    'controllerNamespace' => 'app\commands',
    'components' => [
        'db' => require(FILE_PATH_CONFIG_ENV . '_db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require(FILE_PATH_CONFIG_ENV . '_routes.php'),
            'baseUrl' => 'http://git.blog',
            'scriptUrl' => 'http://git.blog',
        ],
        'authManager' => require(FILE_PATH_CONFIG_ENV . '_auth.php'),
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                ['class' => 'yii\log\FileTarget', 'levels' => ['error', 'warning']]
            ]
        ]
    ],
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
];