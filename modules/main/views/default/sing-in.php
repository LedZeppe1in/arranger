<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\admin\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'SIGN_IN_PAGE_TITLE');;
?>

<!-- Breadcrumbs Section -->
<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(/web/images/breadcrumbs-sing-in.jpg);">
    <div class="container">
        <h3 class="breadcrumbs-custom-title"><?= $this->title ?></h3>
    </div>
</section>

<!-- Login Forms -->
<section class="section section-md bg-default">
    <div class="container">
        <div class="row row-50 justify-content-md-between">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <h4><?= Html::encode($this->title) ?></h4>
                <?php $form = ActiveForm::begin([
                    'id' => 'sign-in-form',
                    'options' => [
                        'class' => 'rd-form',
                    ]
                ]); ?>

                    <div class="form-wrap form-wrap-icon">
                        <div class="form-icon mdi mdi-account-outline"></div>
                        <?= $form->field($model, 'username')->textInput(['class' => 'form-input'])->label(false) ?>
                        <label class="form-label rd-input-label" for="loginform-username">
                            <?= Yii::t('app', 'LOGIN_FORM_USERNAME') ?>
                        </label>
                    </div>

                    <div class="form-wrap form-wrap-icon">
                        <div class="form-icon mdi mdi-key"></div>
                        <?= $form->field($model, 'password')->passwordInput()->textInput(['class' => 'form-input'])
                            ->label(false) ?>
                        <label class="form-label rd-input-label" for="loginform-password">
                            <?= Yii::t('app', 'LOGIN_FORM_PASSWORD') ?>
                        </label>
                    </div>

                    <div class="form-wrap form-wrap-checkbox">
                        <label class="checkbox">
                            <?= $form->field($model, 'rememberMe')->checkbox() ?>
                            <span class="label"> <?= Yii::t('app', 'LOGIN_FORM_REMEMBER_ME') ?></span>
                        </label>
                    </div>

                    <div style="color:#999;margin:1em 0">
                        <?= Yii::t('app', 'SIGN_IN_PAGE_RESET_TEXT') . ' ' .
                        Html::a(Yii::t('app', 'SIGN_IN_PAGE_RESET_LINK'), ['password-reset-request']) ?>.
                    </div>

                    <div class="button-wrap group-md">
                        <?= Html::submitButton(Yii::t('app', 'BUTTON_SIGN_IN'),
                            ['class' => 'button button-default', 'name' => 'sign-in-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>