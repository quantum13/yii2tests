<?php

namespace app\modules\books\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "books_books".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 * @property string $preview
 * @property string $date
 * @property integer $author_id
 *
 * @property Author $author
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books_books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'author_id'], 'required', 'on' => 'default'],
            [['date_create', 'date_update', 'date'], 'safe', 'on' => 'default'],
            [['author_id'], 'integer', 'on' => 'default'],
            [['name', 'preview'], 'string', 'max' => 255, 'on' => 'default'],
            [['preview'], 'image', 'checkExtensionByMimeType' => true, 'extensions' => 'png, jpg', 'on' => 'upload'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'preview' => 'Картинка',
            'date' => 'Дата выхода книги',
            'author_id' => 'Автор',
            'date_create' => 'Дата добавления',
            'date_update' => 'Дата изменения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            unlink(self::getPreviewDir() . $this->preview);
            unlink(self::getPreviewThumpDir() . $this->preview);
            return true;
        } else {
            return false;
        }
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getPreviewUrl()
    {
        if (empty($this->preview)) {
            return '/images/empty.jpg';
        }
        return '/uploads/images/books/' . $this->preview;
    }

    public function getPreviewThumbUrl()
    {
        if (empty($this->preview)) {
            return '/images/empty-thumb.jpg';
        }
        return '/uploads/images/books-thumbs/' . $this->preview;
    }

    public static function getPreviewDir()
    {
        return Yii::getAlias('@app/public/uploads/images/books/');
    }

    public static function getPreviewThumpDir()
    {
        return Yii::getAlias('@app/public/uploads/images/books-thumbs/');
    }
}
