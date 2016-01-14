<?php

use yii\db\Migration;

class m160114_111836_create_users extends Migration
{
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'access_token' => $this->string()->notNull(),
            'auth_key' => $this->string()->notNull(),
        ]);

        $this->insert('users', [
            'id' => null,
            'username' => 'user',
            'password_hash' => Yii::$app->security->generatePasswordHash('123'),
            'access_token' => Yii::$app->security->generateRandomString(),
            'auth_key' => Yii::$app->security->generateRandomString(),
        ]);
    }

    public function down()
    {
        $this->dropTable('users');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
