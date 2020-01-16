<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SheetMusic */
/* @var $reviews app\modules\admin\models\Review */
/* @var $new_review app\modules\admin\models\Review */

use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
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
<section class="section section-lg bg-default">
    <div class="container">
        <h3 class="custom-title"><?= Yii::t('app', 'REVIEWS') ?></h3>

        <!-- Review List -->
        <?php if ($reviews): ?>
            <?php foreach ($reviews as $review): ?>
                <br />
                <div class="aside-wrap">
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
        <?php endif; ?>

        <!-- Review Form -->
        <?php $form = ActiveForm::begin([
            'id' => 'review-form',
            'options' => [
                'class' => 'rd-form form-boxed',
            ]
        ]); ?>
            <div class="row row-50">
                <div class="col-lg-4">
                    <div class="form-wrap form-wrap-icon">
                        <div class="form-icon mdi mdi-account-outline"></div>
                        <?= $form->field($new_review, 'name')
                            ->textInput(['class' => 'form-input'])->label(false) ?>
                        <label class="form-label rd-input-label" for="review-name">
                            <?= Yii::t('app', 'REVIEW_MODEL_NAME') ?>
                        </label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-wrap form-wrap-icon">
                        <div class="form-icon mdi mdi-information-outline"></div>
                        <?= $form->field($new_review, 'city')
                            ->textInput(['class' => 'form-input'])->label(false) ?>
                        <label class="form-label rd-input-label" for="review-city">
                            <?= Yii::t('app', 'REVIEW_MODEL_CITY') ?>
                        </label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-wrap form-wrap-icon">
                        <div class="form-icon mdi mdi-information-outline"></div>
                        <?= $form->field($new_review, 'occupation')
                            ->textInput(['class' => 'form-input'])->label(false) ?>
                        <label class="form-label rd-input-label" for="review-occupation">
                            <?= Yii::t('app', 'REVIEW_MODEL_OCCUPATION') ?>
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-wrap form-wrap-icon">
                        <div class="form-icon mdi mdi-message-outline"></div>
                        <label class="form-label rd-input-label" for="review-text">
                            <?= Yii::t('app', 'REVIEW_MODEL_TEXT') ?>
                        </label>
                        <?= $form->field($new_review, 'text')
                            ->textarea(['class' => 'form-input form-control-last-child', 'rows' => 6])
                            ->label(false) ?>
                    </div>
                </div>
                <div class="col-12">
                    <?= $form->field($new_review, 'verifyCode')->widget(Captcha::className(), [
                        'captchaAction' => '/main/default/captcha',
                        'template' => '<div class="col-lg-2">{image}</div>
                                        <div class="col-lg-4">
                                            <div class="form-wrap form-wrap-icon">
                                                <div class="form-icon mdi mdi-code-string"></div>
                                                {input}
                                                <label class="form-label rd-input-label" for="review-verifycode">' .
                            Yii::t('app', 'REVIEW_MODEL_VERIFICATION_CODE'). '</label>
                                            </div>
                                        </div>',
                        'options' => ['class' => 'form-input'],
                    ])->label(false) ?>
                </div>
                <div class="col-md-12">
                    <?= Html::submitButton(Yii::t('app', 'BUTTON_SEND_REVIEW'), [
                        'class' => 'button button-default',
                        'name' => 'send-review-button'
                    ]) ?>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</section>