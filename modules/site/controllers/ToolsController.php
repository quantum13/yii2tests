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
        Yii::$app->db->createCommand('SET FOREIGN_KEY_CHECKS=0;')->execute();
        foreach (Yii::$app->db->schema->getTableNames() as $table) {
            Yii::$app->db->createCommand()->dropTable($table)->execute();
        }
        Yii::$app->db->createCommand('SET FOREIGN_KEY_CHECKS=1;')->execute();
    }

}
