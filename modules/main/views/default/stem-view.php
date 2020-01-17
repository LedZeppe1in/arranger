<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\MusicTrack */
/* @var $reviews app\modules\admin\models\Review */
/* @var $new_review app\modules\admin\models\Review */

use yii\helpers\Html;

$this->title = Yii::t('app', 'STEM_PAGE_TITLE');
?>

<!-- Breadcrumbs Section -->
<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(/web/images/breadcrumbs-stems.jpg);">
    <div class="container">
        <h3 class="breadcrumbs-custom-title"><?= $this->title ?></h3>
        <pre-footer-classic class="breadcrumbs-custom-subtitle">
            <?= Yii::t('app', 'STEM_PAGE_TEXT') ?>
        </pre-footer-classic>
    </div>
</section>

<!-- Stem Section -->
<section class="section section-lg bg-default">
    <div class="container">
        <div class="row row-50 justify-content-between">
            <div class="col-md-7">
                <h3 class="custom-title"><?= $model->name ?></h3>
                <p class="big"><?= $model->description ?></p><br />
                <h5 class="custom-title"><?= Yii::t('app', 'MUSIC_TRACK_MODEL_PREVIEW') ?></h5>
                <p>
                    <audio controls>
                        <source src="/web/uploads/music-tracks/<?= $model->id ?>/<?= basename($model->preview) ?>"
                                type="audio/mpeg">
                    </audio>
                </p>
                <?= Html::a(Yii::t('app', 'BUTTON_VIEW_MORE_INFO'), ['/main/default/stems'],
                    ['class' => 'button button-default offset-left-106']) ?>
            </div>
            <div class="col-md-5 inset-left-80">
                <ul class="box-list">
                    <li>
                        <div class="heading-6 title text-primary"><?= Yii::t('app', 'MUSIC_TRACK_MODEL_TYPE') ?></div>
                        <p class="font-weight-regular"><?= $model->getTypeName() ?></p>
                    </li>
                    <li>
                        <div class="heading-6 title text-primary">
                            <?= Yii::t('app', 'MUSIC_TRACK_MODEL_DURATION') ?>
                        </div>
                        <p class="font-weight-regular">
                            <?= Yii::$app->formatter->asDate($model->duration, "HH:mm") ?>
                        </p>
                    </li>
                    <li>
                        <div class="heading-6 title text-primary"><?= Yii::t('app', 'MUSIC_TRACK_MODEL_PRICE') ?></div>
                        <p class="font-weight-regular">&#8381;<?= $model->price ?></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Stem Review Section -->
<?= $this->render('_modal_form_review', ['reviews' => $reviews, 'new_review' => $new_review]) ?>