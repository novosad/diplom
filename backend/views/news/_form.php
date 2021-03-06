<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_news')->label('Заголовок')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_news')->label('Дата')->textInput() ?>

    <?= $form->field($model, 'description_news')->label('Текст')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'photo_news')->label('Фото')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
