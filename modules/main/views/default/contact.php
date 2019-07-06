<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\main\models\ContactForm */

use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'CONTACT_US_PAGE_TITLE');

$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?= Html::encode(Yii::t('app', 'CONTACTS_PAGE_TITLE')) ?></h1>

    <h3><?= Yii::t('app', 'FIRST_NAME') . ' ' . Yii::t('app', 'LAST_NAME')?></h3>

    <div class="text-contact">
        <?php
        $em = explode(", ", $user->email);
        foreach($em as $em)
        {
            echo "<a href=\"mailto:".$em."\" >".$em."</a>"." ";
        }
        ?>
    </div>

    <div class="text-contact">
        <?= $user->phone ?>
    </div>

    <div class="text-contact">
        <b>YouTube:</b>
        <a href="<?= $user->youtube_link ?>" ><?= $user->youtube_link ?></a>
    </div>

    <div class="text-contact">
        <b>Instagram:</b>
        <a href="<?= $user->instagram_link ?>" ><?= $user->instagram_link ?></a>
    </div>

    <div class="text-contact">
        <b>Facebook:</b>
        <a href="<?= $user->facebook_link ?>" ><?= $user->facebook_link ?></a>
    </div>

    <div class="text-contact">
        <b>Twitter:</b>
        <a href="<?= $user->twitter_link ?>" ><?= $user->twitter_link ?></a>
    </div>

    <div class="text-contact">
        <b>VK:</b>
        <a href="<?= $user->vk_link ?>" ><?= $user->vk_link ?></a>
    </div>

</div>

<div class="main-default-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            <?= Yii::t('app', 'CONTACT_US_PAGE_SUCCESS_MESSAGE') ?>
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

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