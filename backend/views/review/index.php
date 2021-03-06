<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        //Html::a('Create Review', ['create'], ['class' => 'btn btn-success'])
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_review',
            'review_date',
            'review_name',
            'product_id',
            'review',
            'review_moderation',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
