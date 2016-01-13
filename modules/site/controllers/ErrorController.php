<?php

namespace app\modules\site\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

class ErrorController extends Controller
{
    public function actionIndex()
    {
        /** @var HttpException $e */
        $e = Yii::$app->errorHandler->exception;
        if ($e instanceof HttpException && $e->statusCode == 404
        ) {
            return $this->render('404.twig');
        } else {
            return $this->render('500.twig');
        }
    }
}
