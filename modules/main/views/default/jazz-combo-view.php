<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SheetMusic */
/* @var $reviews app\modules\admin\models\Review */

use yii\helpers\Html;

$this->title = Yii::t('app', 'JAZZ_COMBO_PAGE_TITLE');
?>

<!-- Breadcrumbs Section -->
<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(/web/images/breadcrumbs-jazz-combo.jpg);">
    <div class="container">
        <h3 class="breadcrumbs-custom-title"><?= $this->title ?></h3>
        <pre-footer-classic class="breadcrumbs-custom-subtitle">
            <?= Yii::t('app', 'JAZZ_COMBO_PAGE_TEXT') ?>
        </pre-footer-classic>
    </div>
</section>

<!-- Jazz Combo Section -->
<section class="section section-lg bg-default">
    <div class="container">
        <div class="row row-50 justify-content-between">
            <div class="col-md-7">
                <h3 class="custom-title"><?= $model->name ?></h3>
                <p class="big"><?= $model->description ?></p>
                <?= Html::a(Yii::t('app', 'BUTTON_VIEW_MORE_INFO'), ['/main/default/jazz-combo'],
                    ['class' => 'button button-default offset-left-106']) ?>
            </div>
            <div class="col-md-5 inset-left-80">
                <ul class="box-list">
                    <li>
                        <div class="heading-6 title text-primary"><?= Yii::t('app', 'SHEET_MUSIC_MODEL_TYPE') ?></div>
                        <p class="font-weight-regular"><?= $model->getTypeName() ?></p>
                    </li>
                    <li>
                        <div class="heading-6 title text-primary">
                            <?= Yii::t('app', 'SHEET_MUSIC_PAGE_PAGE_COUNT') ?>
                        </div>
                        <p class="font-weight-regular"><?= $model->getPdfPageCount(); ?></p>
                    </li>
                    <li>
                        <div class="heading-6 title text-primary"><?= Yii::t('app', 'SHEET_MUSIC_MODEL_PRICE') ?></div>
                        <p class="font-weight-regular">&#8381;<?= $model->price ?></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Jazz Combo Preview Section -->
<section class="section section-lg bg-gray-700">
    <div class="container">
        <h3 class="custom-title"><?= Yii::t('app', 'SHEET_MUSIC_MODEL_PREVIEW') ?></h3>
        <ul class="row row-40 justify-content-between index-list">
            <li class="col-lg-12 index-list-item">
                <?php echo Html::img('@web/uploads/sheet-music/' .$model->id . '/' . basename($model->preview),
                    ['class' => 'pull-left img-responsive']); ?>
            </li>
        </ul>
    </div>
</section>

<!-- Jazz Combo Review Section -->
<?php if ($reviews): ?>
    <section class="section section-lg bg-default">
        <?php foreach ($reviews as $review): ?>
            <div class="container aside-wrap">
                <article class="quote-simple text-black">
                    <div class="time"><?= Yii::$app->formatter->asDate($review->created_at); ?></div>
                    <div class="quote-simple-body">
                        <q><?= $review->text ?></q>
                    </div>
                    <div class="quote-simple-footer">
                        <cite class="heading-5 quote-simple-cite"><?= $review->name ?></cite>
                        <?php if ($review->occupation != ''): ?>
                            <span class="quote-simple-description"><?= $review->occupation ?></span>
                        <?php endif; ?>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </section>
<?php endif; ?>

<section class="section section-sm bg-default"></section>