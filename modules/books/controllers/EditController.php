<?php
namespace app\modules\books\controllers;

use app\modules\site\controllers\BaseController;
use Yii;
use yii\filters\AccessControl;


class EditController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['list'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionList()
    {

        return $this->render('list.twig');
    }
}
