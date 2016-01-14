<?php

use yii\db\Migration;

class m160114_150636_create_books_tables extends Migration
{
    public function safeUp()
    {
        $this->createTable('books_books', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'date_create' => $this->dateTime(),
            'date_update' => $this->dateTime(),
            'preview' => $this->string()->notNull(),
            'date' => $this->date(),
            'author_id' => $this->integer()
        ]);

        $this->createTable('books_authors', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string()->notNull(),
            'lastname' => $this->string()->notNull(),
        ]);

        $this->batchInsert('books_authors', ['firstname', 'lastname'], [
            ['Ivan', 'Bunin'],
            ['Lev', 'Tolstoy'],
            ['Aleksandr', 'Pushkin'],
        ]);

        $this->addForeignKey('authors', 'books_books', 'author_id', 'books_authors', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('books_books');
        $this->dropTable('books_authors');
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
