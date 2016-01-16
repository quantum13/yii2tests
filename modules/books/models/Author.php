<?php

namespace app\modules\books\models;

use Yii;

/**
 * This is the model class for table "books_authors".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 *
 * @property Book[] $books
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books_authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'required'],
            [['firstname', 'lastname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['author_id' => 'id']);
    }

    public function __toString()
    {
        return $this->getFullname();
    }

    public function getFullname()
    {
        return $this->lastname . ($this->lastname ? ' ' : '') . $this->firstname;
    }

    public static function getForSelectbox()
    {
        return Author::find()
            ->select(["concat(lastname, ' ', firstname)"])
            ->indexBy('id')
            ->orderBy('lastname, firstname')
            ->asArray()
            ->column();
    }
}
