<?php

/* @var $reviews app\modules\admin\models\Review */
/* @var $new_review app\modules\admin\models\Review */

use app\modules\main\models\Lang;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Button;
use yii\captcha\Captcha;
use yii\helpers\Html;
?>

<!-- Скрипт модального окна -->
<script type="text/javascript">
    // Выполнение скрипта при загрузке страницы
    $(document).ready(function() {
        // Обработка нажатия кнопки удаление отзыва
        $(".delete-review-button").click(function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            var form = $(this.parentElement);
            // Ajax-запрос
            $.ajax({
                url: "<?= Yii::$app->request->baseUrl . '/' . Lang::getCurrent()->url . '/main/default/review-delete' ?>",
                type: "post",
                data: form.serialize(),
                dataType: "json",
                success: function(data) {
                    // Удаление слоя отзыва
                    document.getElementById("review-" + data["review_id"]).remove();
                },
                error: function() {
                    alert('Error!');
                }
            });
        });
    });
</script>

<section class="section section-lg bg-default">
    <div class="container">
        <h3 class="custom-title"><?= Yii::t('app', 'REVIEWS') ?></h3>

        <!-- Review List -->
        <?php if ($reviews): ?>
            <?php foreach ($reviews as $review): ?>
                <div class="aside-wrap" id="review-<?= $review->id ?>">
                    <article class="quote-simple text-black">
                        <div class="row quote-simple-footer">
                            <div class="col-md-10">
                                <cite class="heading-5 quote-simple-cite"><?= $review->name ?></cite>
                                <?php if ($review->occupation != '' and $review->city != ''): ?>
                                    <span class="quote-simple-cite">
                                    (<?= $review->occupation ?>, <?= $review->city ?>)
                                </span>
                                <?php endif; ?>
                                <?php if ($review->occupation != '' and $review->city == ''): ?>
                                    <span class="quote-simple-cite">(<?= $review->occupation ?>)</span>
                                <?php endif; ?>
                                <?php if ($review->occupation == '' and $review->city != ''): ?>
                                    <span class="quote-simple-cite">(<?= $review->city ?>)</span>
                                <?php endif; ?>
                            </div>
                            <div class="time col-md-2">
                                <?= Yii::$app->formatter->asDate($review->created_at); ?>
                            </div>
                        </div>
                        <div class="quote-simple-body row">
                            <div class="col-md-1 icon icon-md icon-gray-300 linearicons-bubble-text"></div>
                            <div class="col-md-11"><?= $review->text ?></div>
                        </div>
                        <?php if (!Yii::$app->user->isGuest): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $form = ActiveForm::begin([
                                        'id' => 'review-form-' . $review->id,
                                        'enableAjaxValidation' => true,
                                        'enableClientValidation' => true,
                                    ]); ?>
                                        <?= $form->field($review, 'id')
                                                 ->hiddenInput(['value' => $review->id])
                                                 ->label(false) ?>
                                        <?= Button::widget([
                                            'label' => Yii::t('app', 'BUTTON_DELETE'),
                                            'options' => [
                                                'class' => 'button button-sm button-default delete-review-button',
                                                'style' => 'float:right; margin:0;'
                                            ]
                                        ]); ?>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
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
                        <div class="form-icon mdi mdi-city"></div>
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