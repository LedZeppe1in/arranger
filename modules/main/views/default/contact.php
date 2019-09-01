<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\main\models\ContactForm */
/* @var $user app\modules\admin\models\User */

use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'CONTACTS_PAGE_TITLE');
?>

<!-- Breadcrumbs Section -->
<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(/web/images/breadcrumbs-contact.jpg);">
    <div class="container">
        <h3 class="breadcrumbs-custom-title"><?= $this->title ?></h3>
        <pre-footer-classic class="breadcrumbs-custom-subtitle">
            <?= Yii::t('app', 'CONTACTS_PAGE_TEXT') ?>
        </pre-footer-classic>
    </div>
</section>

<!-- Blurb minimal -->
<section class="section section-md bg-default">
    <div class="container">
        <div class="row row-40">
            <div class="col-sm-6 col-md-4">
                <div class="box-lined">
                    <div class="box-lined-body">
                        <h6 class="box-lined-title"><?= Yii::t('app', 'CONTACTS_PAGE_EMAIL_AND_TELEPHONE') ?></h6>
                        <ul class="box-lined-list text-black">
                            <li>
                                <?php $emails = explode(", ", $user->email);
                                    foreach ($emails as $key => $email)
                                        if ($key == 0)
                                            echo '<a class="big link-default" href="mailto:' . $email . '">' .
                                                $email . '</a>';
                                ?>
                            </li>
                            <li><a class="big link-default" href="tel:#"><?= $user->phone ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="box-lined">
                    <div class="box-lined-body">
                        <h6 class="box-lined-title"><?= Yii::t('app', 'CONTACTS_PAGE_ADDRESS') ?></h6>
                        <ul class="box-lined-list text-black">
                            <li class="big">1418 Riverwood Drive, Suite 3845 Cottonwood, CA 96022 Russia</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="box-lined">
                    <div class="box-lined-body">
                        <h6 class="box-lined-title"><?= Yii::t('app', 'CONTACTS_PAGE_SOCIALS') ?></h6>
                        <ul class="list-inline list-inline-sm">
                            <li>
                                <?= Html::a('', $user->youtube_link,
                                    ['class' => 'icon icon-sm icon-bordered link-default mdi mdi-youtube-play']) ?>
                            </li>
                            <li>
                                <?= Html::a('', $user->instagram_link,
                                    ['class' => 'icon icon-sm icon-bordered link-default mdi mdi-instagram']) ?>
                            </li>
                            <li>
                                <?= Html::a('', $user->twitter_link,
                                    ['class' => 'icon icon-sm icon-bordered link-default mdi mdi-twitter']) ?>
                            </li>
                            <li>
                                <?= Html::a('', $user->facebook_link,
                                    ['class' => 'icon icon-sm icon-bordered link-default mdi mdi-facebook']) ?>
                            </li>
                            <li>
                                <?= Html::a('', $user->vk_link,
                                    ['class' => 'icon icon-sm icon-bordered link-default mdi mdi-vk']) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Get in touch with us -->
<section class="section section-md bg-default">
    <div class="container">
        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

            <div class="alert alert-success">
                <?= Yii::t('app', 'CONTACTS_PAGE_SUCCESS_MESSAGE') ?>
            </div>

        <?php else: ?>

            <h4><?= Yii::t('app', 'CONTACTS_PAGE_TOUCH_WITH_ME') ?></h4>
            <p class="big">
                <?= Yii::t('app', 'CONTACTS_PAGE_NOTICE') ?>
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
                            <?= $form->field($model, 'name')->textInput(['class' => 'form-input'])->label(false) ?>
                            <label class="form-label rd-input-label" for="contactform-name">
                                <?= Yii::t('app', 'CONTACT_FORM_NAME') ?>
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-wrap form-wrap-icon">
                            <div class="form-icon mdi mdi-email-outline"></div>
                            <?= $form->field($model, 'email')->textInput(['class' => 'form-input'])->label(false) ?>
                            <label class="form-label rd-input-label" for="contactform-email">
                                <?= Yii::t('app', 'CONTACT_FORM_EMAIL') ?>
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-wrap form-wrap-icon">
                            <div class="form-icon mdi mdi-information-outline"></div>
                            <?= $form->field($model, 'subject')->textInput(['class' => 'form-input'])->label(false) ?>
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
                            <?= $form->field($model, 'body')
                                ->textarea(['class' => 'form-input form-control-last-child', 'rows' => 6])
                                ->label(false) ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
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
