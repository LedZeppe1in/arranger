<?php

/* @var $this yii\web\View */
/* @var $user app\modules\admin\models\User */
/* @var $contact_form app\modules\main\models\ContactForm */
/* @var $big_band app\modules\admin\models\SheetMusic */
/* @var $jazz_combo app\modules\admin\models\SheetMusic */
/* @var $pop_music app\modules\admin\models\SheetMusic */
/* @var $jingle app\modules\admin\models\MusicTrack */
/* @var $stem app\modules\admin\models\MusicTrack */
/* @var $project app\modules\admin\models\Project */
/* @var $sheet_music_count app\modules\main\controllers\DefaultController */
/* @var $music_track_count app\modules\main\controllers\DefaultController */
/* @var $project_count app\modules\main\controllers\DefaultController */

use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\helpers\StringHelper;
use yii\bootstrap\ActiveForm;

$this->title = Yii::$app->language == 'ru-RU' ? $user->full_name_ru : $user->full_name_en;
?>

<!-- Подключение js-скрипта -->
<?php $this->registerJsFile('/js/wow.min.js', ['position' => yii\web\View::POS_HEAD]) ?>
<!-- Инициализация анимации -->
<script>new WOW().init();</script>

<!-- Portfolio -->
<section class="section section-lg bg-default section-lined">
    <div class="container container-lined">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container container-custom-width">
        <h3 class="text-center"><?= Yii::t('app', 'MY_LATEST_ART') ?></h3>
        <div class="row row-custom-width row-30 row-xxl-100 row-flex">
            <div class="col-sm-6 col-lg-4 wow fadeInRight" style="visibility: hidden; animation-name: none;">
                <div class="project-grid" style="background-image: url(/web/images/project-1.jpg);">
                    <div class="inner"><?= Html::img('@web/images/bg-pattern-transparent.png') ?>
                        <h5 class="title text-capitalize">
                            <?= Html::a($big_band->name, ['/big-band-view/' . $big_band->id]) ?>
                        </h5>
                        <p class="font-weight-regular exeption">
                            <?= StringHelper::truncate($big_band->description, 100, '...') ?>
                        </p>
                        <?= Html::a(Yii::t('app', 'BUTTON_VIEW'), ['/big-band-view/' . $big_band->id],
                            ['class' => 'button button-default']) ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay="0.2s" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                <div class="project-grid" style="background-image: url(/web/images/project-2.jpg);">
                    <div class="inner"><?= Html::img('@web/images/bg-pattern-transparent.png') ?>
                        <h5 class="title text-capitalize">
                            <?= Html::a($jazz_combo->name, ['/jazz-combo-view/' . $jazz_combo->id]) ?>
                        </h5>
                        <p class="font-weight-regular exeption">
                            <?= StringHelper::truncate($jazz_combo->description, 100, '...') ?>
                        </p>
                        <?= Html::a(Yii::t('app', 'BUTTON_VIEW'), ['/jazz-combo-view/' . $jazz_combo->id],
                            ['class' => 'button button-default']) ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay="0.4s" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                <div class="project-grid" style="background-image: url(/web/images/project-3.jpg);">
                    <div class="inner"><?= Html::img('@web/images/bg-pattern-transparent.png') ?>
                        <h5 class="title text-capitalize">
                            <?= Html::a($pop_music->name, ['/pop-music-view/' . $pop_music->id]) ?>
                        </h5>
                        <p class="font-weight-regular exeption">
                            <?= StringHelper::truncate($pop_music->description, 100, '...') ?>
                        </p>
                        <?= Html::a(Yii::t('app', 'BUTTON_VIEW'), ['/pop-music-view/' . $pop_music->id],
                            ['class' => 'button button-default']) ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay="0.2s" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                <div class="project-grid" style="background-image: url(/web/images/project-4.jpg);">
                    <div class="inner"><?= Html::img('@web/images/bg-pattern-transparent.png') ?>
                        <h5 class="title text-capitalize">
                            <?= Html::a($jingle->name, ['/jingle-view/' . $jingle->id]) ?>
                        </h5>
                        <p class="font-weight-regular exeption">
                            <?= StringHelper::truncate($jingle->description, 100, '...') ?>
                        </p>
                        <?= Html::a(Yii::t('app', 'BUTTON_VIEW'), ['/jingle-view/' . $jingle->id],
                            ['class' => 'button button-default']) ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay="0.4s" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                <div class="project-grid" style="background-image: url(/web/images/project-5.jpeg);">
                    <div class="inner"><?= Html::img('@web/images/bg-pattern-transparent.png') ?>
                        <h5 class="title text-capitalize">
                            <?= Html::a($stem->name, ['/stem-view/' . $stem->id]) ?>
                        </h5>
                        <p class="font-weight-regular exeption">
                            <?= StringHelper::truncate($stem->description, 100, '...') ?>
                        </p>
                        <?= Html::a(Yii::t('app', 'BUTTON_VIEW'), ['/stem-view/' . $stem->id],
                            ['class' => 'button button-default']) ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay="0.6s" style="visibility: hidden; animation-delay: 0.6s; animation-name: none;">
                <div class="project-grid" style="background-image: url(/web/images/project-6.jpeg);">
                    <div class="inner"><?= Html::img('@web/images/bg-pattern-transparent.png') ?>
                        <h5 class="title text-capitalize">
                            <?= Html::a($project->name, ['/project-view/' . $project->id]) ?>
                        </h5>
                        <p class="font-weight-regular exeption">
                            <?= StringHelper::truncate($project->description, 100, '...') ?>
                        </p>
                        <?= Html::a(Yii::t('app', 'BUTTON_VIEW'), ['/project-view/' . $project->id],
                            ['class' => 'button button-default']) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-wrap-1 text-center">
            <?= Html::a(Yii::t('app', 'BUTTON_VIEW_ALL_WORKS'), ['/main/default/big-band'],
                ['class' => 'button button-default']) ?>
        </div>
    </div>
</section>

<!-- Branding -->
<section class="section section-lg bg-gray-700 text-center text-sm-left">
    <div class="container">
        <div class="row row-50">
            <div class="col-lg-9">
                <div class="row row-30 row-xxl-85">
                    <div class="col-sm-6 col-md-4">
                        <h5><?= Yii::t('app', 'BRANDING_CUSTOM_SHEET_MUSIC') ?></h5>
                        <ul class="list-xs font-weight-regular">
                            <li>
                                <?= Html::a(Yii::t('app', 'BRANDING_BIG_BAND'),
                                    ['/main/default/big-band'], ['class' => 'link-item']) ?>
                            </li>
                            <li>
                                <?= Html::a(Yii::t('app', 'BRANDING_JAZZ_COMBO'),
                                    ['/main/default/jazz-combo'], ['class' => 'link-item']) ?>
                            </li>
                            <li>
                                <?= Html::a(Yii::t('app', 'BRANDING_POP_MUSIC'),
                                    ['/main/default/pop-music'], ['class' => 'link-item']) ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <h5><?= Yii::t('app', 'BRANDING_CUSTOM_TRACKS') ?></h5>
                        <ul class="list-xs font-weight-regular">
                            <li>
                                <?= Html::a(Yii::t('app', 'BRANDING_JINGLES'),
                                    ['/main/default/jingles'], ['class' => 'link-item']) ?>
                            </li>
                            <li>
                                <?= Html::a(Yii::t('app', 'BRANDING_STEMS'),
                                    ['/main/default/stems'], ['class' => 'link-item']) ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <h5><?= Yii::t('app', 'BRANDING_INTERESTING') ?></h5>
                        <ul class="list-xs font-weight-regular">
                            <li>
                                <?= Html::a(Yii::t('app', 'BRANDING_EVENTS'),
                                    ['/main/default/events'], ['class' => 'link-item']) ?>
                            </li>
                            <li>
                                <?= Html::a(Yii::t('app', 'BRANDING_PROJECTS'),
                                    ['/main/default/projects'], ['class' => 'link-item']) ?>
                            </li>
                            <li>
                                <?= Html::a(Yii::t('app', 'BRANDING_PUBLICATIONS'),
                                    ['/main/default/publications'], ['class' => 'link-item']) ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <article class="box-counter">
                            <div class="box-counter-main">
                                <div class="counter animated-first"><?= strval($sheet_music_count) ?></div>
                            </div>
                            <div class="box-counter-title"><?= Yii::t('app', 'BRANDING_SHEET_MUSIC_COUNT') ?></div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <article class="box-counter">
                            <div class="box-counter-main">
                                <div class="counter animated-first"><?= strval($music_track_count) ?></div>
                            </div>
                            <div class="box-counter-title"><?= Yii::t('app', 'BRANDING_TRACK_COUNT') ?></div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <article class="box-counter">
                            <div class="box-counter-main">
                                <div class="counter animated-first"><?= strval($project_count) ?></div>
                            </div>
                            <div class="box-counter-title"><?= Yii::t('app', 'BRANDING_PROJECT_COUNT') ?></div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="heading-3"><?= Yii::t('app', 'BRANDING_TITLE') ?></div>
                <div class="big text-white-lighter text-white-darken font-family-serif">
                    <?= Yii::t('app', 'BRANDING_TEXT') ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blurb minimal -->
<section class="section section-lg bg-default section-lined">
    <div class="container container-lined">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container">
        <div class="row row-40">
            <div class="col-sm-6 col-md-4 wow fadeInUp" style="visibility: hidden; animation-name: none;">
                <!-- Blurb minimal-->
                <div class="blurb-minimal unit unit-spacing-md flex-column flex-lg-row">
                    <div class="unit-left">
                        <div class="blurb-minimal-icon linearicons-music-note"></div>
                    </div>
                    <div class="unit-body">
                        <h5 class="blurb-minimal-title"><?= Yii::t('app', 'BLURB_ORIGINAL_ARRANGEMENT') ?></h5>
                        <p class="blurb-minimal-exeption"><?= Yii::t('app', 'BLURB_ORIGINAL_ARRANGEMENT_TEXT') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 wow fadeInUp" data-wow-delay="0.2s" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                <!-- Blurb minimal-->
                <div class="blurb-minimal unit unit-spacing-md flex-column flex-lg-row">
                    <div class="unit-left">
                        <div class="blurb-minimal-icon linearicons-diamond"></div>
                    </div>
                    <div class="unit-body">
                        <h5 class="blurb-minimal-title"><?= Yii::t('app', 'BLURB_BEST_EQUIPMENT') ?></h5>
                        <p class="blurb-minimal-exeption"><?= Yii::t('app', 'BLURB_BEST_EQUIPMENT_TEXT') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 wow fadeInUp" data-wow-delay="0.4s" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                <!-- Blurb minimal-->
                <div class="blurb-minimal unit unit-spacing-md flex-column flex-lg-row">
                    <div class="unit-left">
                        <div class="blurb-minimal-icon linearicons-star"></div>
                    </div>
                    <div class="unit-body">
                        <h5 class="blurb-minimal-title"><?= Yii::t('app', 'BLURB_UNIQUE_ART') ?></h5>
                        <p class="blurb-minimal-exeption"><?= Yii::t('app', 'BLURB_UNIQUE_ART_TEXT') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About -->
<section id="about-me-section" class="section section-lg bg-gray-100 section-lined">
    <div class="container container-lined">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container">
        <div class="row row-50 justify-content-between">
            <div class="col-lg-7 col-xl-8">
                <div class="row no-gutters offset-custom-5">
                    <?= Html::img('@web/images/about-me.jpg', ['width' => '782', 'height' => '663']) ?>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="row row-30 row-xxl-55 justify-content-end">
                    <div class="col-sm-6 col-lg-9 col-xl-10 text-lg-right">
                        <h3 class="offset-left-70 custom-title"><?= Yii::t('app', 'ABOUT_ME') ?></h3>
                        <div class="big-text font-family-serif">
                            <?= Yii::$app->language == 'ru-RU' ? $user->biography_ru : $user->biography_en ?>
                        </div>
                        <div class="divider divider-2 d-none d-lg-block"></div>
                    </div>
                    <div class="col-sm-6 col-lg-8">
                        <div class="counter-minimal">
                            <div class="counter-left">
                                <div class="counter animated-first">15</div>
                            </div>
                            <div class="counter-right">
                                <div class="postfix">+</div>
                                <div class="title"><?= Yii::t('app', 'ABOUT_YEARS_OF_EXPERIENCE') ?></div>
                            </div>
                        </div>
                        <ul class="list-marked list-marked-big offset-custom-6">
                            <li><?= Yii::t('app', 'ABOUT_MUSICIAN') ?></li>
                            <li><?= Yii::t('app', 'ABOUT_ARRANGER') ?></li>
                            <li><?= Yii::t('app', 'ABOUT_MULTI_INSTRUMENTALIST') ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Get in touch with us -->
<section class="section section-md bg-default wow fadeIn section-lined" data-wow-delay="0.2s" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
    <div class="container container-lined">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container">
        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

            <div class="alert alert-success">
                <?= Yii::t('app', 'CONTACTS_PAGE_SUCCESS_MESSAGE') ?>
            </div>

        <?php else: ?>

            <h3><?= Yii::t('app', 'TOUCH_WITH_ME') ?></h3>
            <p class="big">
                <?= Yii::t('app', 'ONE_CONTACT_TEXT') ?><br class="d-none d-xl-inline">
                <?= Yii::t('app', 'TWO_CONTACT_TEXT') ?>
            </p>
            <!-- Contact form -->
            <?php $form = ActiveForm::begin([
                'id' => 'contact-form',
                'options' => [
                    'class' => 'rd-form form-boxed',
                ]
            ]); ?>
                <div class="row row-50">

                    <div class="col-lg-4">
                        <div class="form-wrap form-wrap-icon">
                            <div class="form-icon mdi mdi-account-outline"></div>
                            <?= $form->field($contact_form, 'name')
                                ->textInput(['class' => 'form-input'])->label(false) ?>
                            <label class="form-label rd-input-label" for="contactform-name">
                                <?= Yii::t('app', 'CONTACT_FORM_NAME') ?>
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-wrap form-wrap-icon">
                            <div class="form-icon mdi mdi-email-outline"></div>
                            <?= $form->field($contact_form, 'email')
                                ->textInput(['class' => 'form-input'])->label(false) ?>
                            <label class="form-label rd-input-label" for="contactform-email">
                                <?= Yii::t('app', 'CONTACT_FORM_EMAIL') ?>
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-wrap form-wrap-icon">
                            <div class="form-icon mdi mdi-information-outline"></div>
                            <?= $form->field($contact_form, 'subject')
                                ->textInput(['class' => 'form-input'])->label(false) ?>
                            <label class="form-label rd-input-label" for="contactform-subject">
                                <?= Yii::t('app', 'CONTACT_FORM_SUBJECT') ?>
                            </label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-wrap form-wrap-icon">
                            <div class="form-icon mdi mdi-message-outline"></div>
                            <label class="form-label rd-input-label" for="contactform-body">
                                <?= Yii::t('app', 'CONTACT_FORM_MESSAGE') ?>
                            </label>
                            <?= $form->field($contact_form, 'body')
                                ->textarea(['class' => 'form-input form-control-last-child', 'rows' => 6])
                                ->label(false) ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <?= $form->field($contact_form, 'verifyCode')->widget(Captcha::className(), [
                            'captchaAction' => '/main/default/captcha',
                            'template' => '<div class="col-lg-2">{image}</div>
                                <div class="col-lg-4">
                                    <div class="form-wrap form-wrap-icon">
                                        <div class="form-icon mdi mdi-code-string"></div>
                                        {input}
                                        <label class="form-label rd-input-label" for="contactform-verifycode">' .
                                Yii::t('app', 'CONTACT_FORM_VERIFICATION_CODE'). '</label>
                                    </div>
                                </div>',
                            'options' => ['class' => 'form-input'],
                        ])->label(false) ?>
                    </div>

                    <div class="col-md-12">
                        <?= Html::submitButton(Yii::t('app', 'BUTTON_SEND'), [
                            'class' => 'button button-default',
                            'name' => 'contact-button'
                        ]) ?>
                    </div>

            </div>
            <?php ActiveForm::end(); ?>

        <?php endif; ?>
    </div>
</section>