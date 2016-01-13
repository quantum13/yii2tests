<?php
namespace app\modules\books\controllers;

use app\modules\site\controllers\BaseController;
use Yii;


class EditController extends BaseController
{
    public function actionList()
    {

        return $this->render('list.twig');
    }
}
