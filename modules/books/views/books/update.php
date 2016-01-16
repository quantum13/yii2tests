<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\books\models\Book */

$this->title = 'Изменить книгу: ' . ' ' . $model->name;
?>
<div class="book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
