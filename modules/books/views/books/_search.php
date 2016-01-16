<?php

use app\modules\books\models\Author;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\books\models\BookSearch */
?>

<div class="book-search">

    <?php $formWidget = ActiveForm::begin([
        'action' => ['/books/books/index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $formWidget->field($model, 'author_id',
                ['template' => '{input}'])->dropDownList(Author::getForSelectbox(), ['prompt' => 'Автор']) ?>
        </div>
        <div class="col-md-4">
            <?= $formWidget->field($model, 'name',
                ['template' => '{input}'])->textInput(['placeholder' => 'Название книги']) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-2">
            Дата выхода книги:
        </div>
        <div class="col-md-2">
            <?= $formWidget->field($model, 'date_from', ['template' => '{input}'])
                ->widget(DatePicker::className(),
                    ['dateFormat' => 'dd.MM.yyyy'])->textInput(['class' => 'form-control input-sm']) ?>
        </div>
        <div class="col-md-2">
            <?= $formWidget->field($model, 'date_to', ['template' => '{input}'])
                ->widget(DatePicker::className(),
                    ['dateFormat' => 'dd.MM.yyyy'])->textInput(['class' => 'form-control input-sm']) ?>
        </div>
        <div class="col-md-4 pull-right text-right">
            <?= Html::submitButton('Искать', ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
