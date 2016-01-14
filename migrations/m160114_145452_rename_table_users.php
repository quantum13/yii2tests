<?php

use yii\db\Migration;

class m160114_145452_rename_table_users extends Migration
{
    public function up()
    {
        $this->renameTable('users', 'site_users');
    }

    public function down()
    {
        $this->renameTable('site_users', 'users');
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
