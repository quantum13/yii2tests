<?php

use app\modules\books\models\Author;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\books\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preview')->fileInput() ?>

    <?= $form->field($model, 'date')->textInput()->widget(DatePicker::className(),
        ['dateFormat' => 'yyyy-MM-dd'])->textInput(['class' => 'form-control']) ?>

    <?= $form->field($model, 'author_id')->dropDownList(Author::getForSelectbox(), ['prompt' => 'Автор']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
