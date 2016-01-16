<?php

use app\modules\books\assetbundles\BooksListAsset;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\books\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

BooksListAsset::register($this);

$this->title = 'Книги';
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить книгу', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>


    <?= GridView::widget([
        'id' => 'books-grid',
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'filterSelector' => '.custom-filters',
        'columns' => [
            'id',
            [
                'label' => 'Название',
                'attribute' => 'name',
            ],
            [
                'label' => 'Превью',
                'attribute' => 'preview',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(
                        Html::img(Url::toRoute('/' . $data->previewThumbUrl), [
                            'alt' => $data->name,
                        ]),
                        $data->previewUrl,
                        ['class' => 'preview']
                    );
                },
            ],
            [
                'label' => 'Автор',
                'attribute' => 'author',
                'value' => 'author.fullname'
            ],
            [
                'label' => 'Дата выхода книги',
                'attribute' => 'date',
                'format' => ['date', 'long']
            ],
            [
                'label' => 'Дата добавления',
                'attribute' => 'date_create',
                'format' => ['relativeTime']
            ],
            [
                'header' => 'Кнопки действия',
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'class' => 'view-button',
                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('yii', 'Update'),
                            'aria-label' => Yii::t('yii', 'Update'),
                            'data-pjax' => '0',
                            'target' => '_blank'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>

    <?php
    yii\bootstrap\Modal::begin(['id' => 'modal']);
    yii\bootstrap\Modal::end();
    ?>
</div>
