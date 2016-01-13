<?php

namespace app\modules\site\controllers;

use Yii;
use yii\web\Controller;

class HomeController extends Controller
{
    public function actionHome()
    {
        return $this->render('home.twig');
    }
}
