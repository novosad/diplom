<?php
/**
 * view item
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->registerJsFile(
    '/js/jquery.js'
);

$this->registerJsFile(
    '/js/review.js'
);

// formation menu
foreach ($article as $capArticle) {
    $caption = $capArticle->product_name;
}

foreach ($section as $vlSection) {
    $dirSection = $vlSection->section_name;
    $urlSection = $vlSection->id_section;
}

foreach ($catalog as $vlCatalog) {
    $dirCatalog = $vlCatalog->catalog_name;
    $urlCatalog = $vlCatalog->id_catalog;
}

?>
<div class="article">
    <div class="navigation"><a href="catalog"> Каталог </a> /
        <a href="section?sect=<?= $urlCatalog; ?>"> <?= $dirCatalog ?> </a> /
        <a href="product?item=<?= $urlSection; ?>"> <?= $dirSection; ?> </a> /
        <?= $caption; ?> </div>

    <?php
    $this->title = $caption;
    foreach ($article as $vlArticle) {
        ?>
        <h1> <?php echo $vlArticle->product_name; ?> </h1>
        <div class="article_photo">
            <img src="/img/catalog/<?php echo $vlArticle->photo; ?>.jpg" alt=""/>
        </div>
        <div class="article_desc">
            <?php echo $vlArticle->description; ?>
            <p class="article_price"> <?php echo $vlArticle->price; ?> руб. </p>

            <p><a href="#" id="review-add"> Оставить отзыв </a></p>
        </div>
    <?php } ?>
</div>
<div class="clr"></div>
<div class="review_view">
    <p><i> Отзывов: </i> <?= $amount ?> </p>
    <?php
    foreach ($comment as $vlComment) {
        // get date
        $bufDate = $vlComment->review_date;
        // unix time
        $unixTime = strtotime($bufDate);
        // current date
        $date_comment = date('d-m-Y', $unixTime); ?>
        <div class="review_look">
            <div class="review_user">
                <?= $vlComment->review_name ?>
            </div>
            <div class="review_date">
                <?= $date_comment ?>
            </div>
            <div class="clr"></div>
            <div class="review_text">
                <?= $vlComment->review ?>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<div class="clr"></div>
<!-- form review -->
<div class="reviews">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->label('Имя') ?>

            <?= $form->field($model, 'body')->textArea(['rows' => 6])->label('Отзыв') ?>

            <?= $form->field($model, 'verifyCode')->label('Введите код')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Отправить отзыв', ['class' => 'btn btn-primary']) ?>

            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

