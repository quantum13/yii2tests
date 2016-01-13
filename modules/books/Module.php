<?php

namespace app\modules\books;

use yii\base\BootstrapInterface;

class Module extends \yii\base\Module implements BootstrapInterface
{
    public $controllerNamespace = 'app\modules\books\controllers';

    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules([
            'GET  books' => 'books/edit/list',
        ], true);
    }

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
