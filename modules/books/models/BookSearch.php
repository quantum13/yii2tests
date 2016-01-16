<?php

namespace app\modules\books\models;

use Quantum13\DateTime2;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BookSearch represents the model behind the search form about `app\modules\books\models\Book`.
 */
class BookSearch extends Book
{
    public $date_from;
    public $date_to;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id'], 'integer'],
            [['name', 'date_from', 'date_to', 'author_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Book::find()->joinWith('author');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['author'] = [
            'asc' => ['books_authors.lastname' => SORT_ASC, 'books_authors.firstname' => SORT_ASC],
            'desc' => ['books_authors.lastname' => SORT_DESC, 'books_authors.firstname' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'author_id' => $this->author_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['>=', 'date', $this->dateFromSql])
            ->andFilterWhere(['<=', 'date', $this->dateToSql]);

        return $dataProvider;
    }

    public function getDateFromSql()
    {
        return $this->date_from ? DateTime2::create($this->date_from)->toStringSql() : $this->date_from;
    }

    public function getDateToSql()
    {
        return $this->date_to ? DateTime2::create($this->date_to)->toStringSql() : $this->date_to;
    }
}
