<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\main\models\ContactForm */
/* @var $user app\modules\admin\models\User */

use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'CONTACT_US_PAGE_TITLE');

$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?= Html::encode(Yii::t('app', 'CONTACTS_PAGE_TITLE')) ?></h1>

    <h3><?= Yii::t('app', 'FIRST_NAME') . ' ' . Yii::t('app', 'LAST_NAME')?></h3>

    <div class="text-contact" style="font-size: 16px;">
        <?php
            $emails = explode(", ", $user->email);
            foreach ($emails as $email)
                echo "<a href=\"mailto:" . $email . "\" >" . $email . "</a> ";
        ?>
    </div>

    <div class="text-contact" style="font-size: 16px;">
        <?= $user->phone ?>
    </div>

    <div class="text-contact">
        <b>YouTube: </b><?= Html::a($user->youtube_link, $user->youtube_link) ?>
    </div>

    <div class="text-contact">
        <b>Instagram: </b><?= Html::a($user->instagram_link, $user->instagram_link) ?>
    </div>

    <div class="text-contact">
        <b>Facebook: </b><?= Html::a($user->facebook_link, $user->facebook_link) ?>
    </div>

    <div class="text-contact">
        <b>Twitter: </b><?= Html::a($user->twitter_link, $user->twitter_link) ?>
    </div>

    <div class="text-contact">
        <b>VK: </b><?= Html::a($user->vk_link, $user->vk_link) ?>
    </div>

</div>

<div class="main-default-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            <?= Yii::t('app', 'CONTACT_US_PAGE_SUCCESS_MESSAGE') ?>
        </div>

    <?php else: ?>

        <p><?= Yii::t('app', 'CONTACT_US_PAGE_TEXT') ?></p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'captchaAction' => '/main/default/captcha',
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'BUTTON_SEND'), [
                        'class' => 'btn btn-primary',
                        'name' => 'contact-button'
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>