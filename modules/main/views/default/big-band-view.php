<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SheetMusic */
/* @var $reviews app\modules\admin\models\Review */
/* @var $new_review app\modules\admin\models\Review */

use yii\helpers\Html;

$this->title = Yii::t('app', 'BIG_BAND_PAGE_TITLE');
?>

<!-- Breadcrumbs Section -->
<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(/web/images/breadcrumbs-big-band.jpg);">
    <div class="container">
        <h3 class="breadcrumbs-custom-title"><?= $this->title ?></h3>
        <pre-footer-classic class="breadcrumbs-custom-subtitle">
            <?= Yii::t('app', 'BIG_BAND_PAGE_TEXT') ?>
        </pre-footer-classic>
    </div>
</section>

<!-- Big Band Section -->
<section class="section section-lg bg-default">
    <div class="container">
        <div class="row row-50 justify-content-between">
            <div class="col-md-7">
                <h3 class="custom-title"><?= $model->name ?></h3>
                <p class="big"><?= $model->description ?></p>
                <?= Html::a(Yii::t('app', 'BUTTON_VIEW_MORE_INFO'), ['/main/default/big-band'],
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

<!-- Big Band Preview Section -->
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

<!-- Big Band Review Section -->
<?= $this->render('_modal_form_review', ['reviews' => $reviews, 'new_review' => $new_review]) ?>