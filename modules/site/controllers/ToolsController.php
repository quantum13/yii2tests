<?php

namespace app\modules\site\controllers;

use Yii;

class ToolsController extends \yii\console\Controller
{

    public function actionDbCleanup($limit = 0)
    {
        if (YII_ENV != 'test') {
            return -1;
        }
        foreach (Yii::$app->db->schema->getTableNames() as $table) {
            Yii::$app->db->createCommand()->dropTable($table)->execute();
        }
    }

}
