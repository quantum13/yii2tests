<?php

$config = [
    'id' => 'yii2tests',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'site',
        'books'
    ],
    'modules' => [
        'site' => 'app\modules\site\Module',
        'books' => 'app\modules\books\Module',
    ],
    'aliases' => [
        '@site' => '@app/modules/site',
    ],
    'layout' => false,
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
    ],
    //'params' => require(__DIR__ . '/params.php')
];

if (file_exists(__DIR__ . '/config.local.php')) {
    require __DIR__ . '/config.local.php';
}

return $config;
