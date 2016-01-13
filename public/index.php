<?php

$time_start = microtime(true);

if (
    !empty($_SERVER['HTTP_HOST']) &&
    $_SERVER['HTTP_HOST'] == 'yii2tests.ok'
) {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
}


require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');
(new yii\web\Application($config))->run();


if (
    !\Yii::$app->request->isAjax &&
    strpos(\Yii::$app->response->getHeaders()->get('Content-Type'), 'application/') === false
) {
    if (YII_ENV_DEV) {
        print sprintf('<div style="position: absolute; top: 3px; right: 10px; color: #900; padding: 1px 5px; background: #e8e8e7;z-index:3000">%0.3f, %0.1f</div>',
            microtime(true) - $time_start, memory_get_peak_usage(true) / 1024 / 1024);
    } else {
        print sprintf('<!-- %0.3f -->', microtime(true) - $time_start);
    }
}