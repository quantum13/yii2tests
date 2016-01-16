<?php

$config = [
    'id' => 'yii2tests',
    'language' => 'ru-RU',
    'timeZone' => 'Asia/Vladivostok',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'site',
        'books',
    ],
    'modules' => [
        'site' => 'app\modules\site\Module',
        'books' => 'app\modules\books\Module',
    ],
    'aliases' => [
        '@site' => '@app/modules/site',
    ],
    //'layout' => false,
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => "mysql:host=localhost;dbname=yii2tests",
            'username' => 'root',
            'password' => '',
            'enableSchemaCache' => defined('YII_DEBUG') && !YII_DEBUG,
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'defaultTimeZone' => 'Asia/Vladivostok',
        ],
        'request' => [
            'cookieValidationKey' => 'dsfsdfsdfsdfsdfsdfsdfsdfsdf444$$$',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'linkAssets' => YII_DEBUG ? false : true,
        ],
        'user' => [
            'identityClass' => 'app\modules\site\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/auth/login']
        ],
        'errorHandler' => [
            'errorAction' => 'site/error/index',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => YII_DEBUG ? ['error', 'warning'] : ['error'],
                ],
            ],
        ],
        'view' => [
            'class' => 'yii\web\View',
            'renderers' => [

                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    'cachePath' => '@runtime/Twig/cache',
                    // Array of twig options:
                    'options' => YII_DEBUG ? [
                        'debug' => true,
                        'auto_reload' => true,
                    ] : [],
                    'extensions' => YII_DEBUG ? [
                        '\Twig_Extension_Debug',
                    ] : [],
                    'globals' => ['html' => '\yii\helpers\Html'],
                    'filters' => [

                    ],
                    'uses' => ['yii\bootstrap'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            //'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [],
        ]
    ],
    'params' => require(__DIR__ . '/params.php')
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*'],
    ];

    //Сброс ассетов
    if (isset($_GET['asset'])) {
        $config['components']['assetManager']['forceCopy'] = true;
    }
}

if (file_exists(__DIR__ . '/config.local.php')) {
    require __DIR__ . '/config.local.php';
}

return $config;
