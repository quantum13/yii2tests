<?php

namespace app\modules\books;

use yii\base\BootstrapInterface;

class Module extends \yii\base\Module implements BootstrapInterface
{
    public $controllerNamespace = 'app\modules\books\controllers';
    public $layout = 'main.php';

    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules([
            'GET  books' => 'books/books/index',
        ], true);
    }

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
