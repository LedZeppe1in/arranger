<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Event */

use yii\helpers\Html;

$this->title = Yii::t('app', 'EVENT_PAGE_TITLE');
?>

<!-- Breadcrumbs Section -->
<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(/web/images/breadcrumbs-event.jpg);">
    <div class="container">
        <h3 class="breadcrumbs-custom-title"><?= $this->title ?></h3>
        <pre-footer-classic class="breadcrumbs-custom-subtitle">
            <?= Yii::t('app', 'EVENT_PAGE_TEXT') ?>
        </pre-footer-classic>
    </div>
</section>

<!-- Event Section -->
<section class="section section-lg bg-default">
    <div class="container">
        <div class="row row-50 justify-content-between">
            <div class="col-md-7">
                <h3 class="custom-title"><?= $model->name ?></h3>
                <p class="big"><?= $model->description ?></p><br />
                <?php if($model->link != '') {
                    echo Html::a(Yii::t('app', 'BUTTON_READ_MORE'), $model->link,
                        ['class' => 'button button-default offset-left-106']);
                } ?>
                <?= Html::a(Yii::t('app', 'BUTTON_VIEW_MORE_INFO'), ['/main/default/events'],
                    ['class' => 'button button-default offset-left-106']) ?>
            </div>
            <div class="col-md-5 inset-left-80">
                <ul class="box-list">
                    <li>
                        <div class="heading-6 title text-primary"><?= Yii::t('app', 'EVENT_MODEL_DATE') ?></div>
                        <p class="font-weight-regular">
                            <?= Yii::$app->formatter->asDate($model->date, "dd MMMM Y, HH:mm") ?>
                        </p>
                    </li>
                    <li>
                        <div class="heading-6 title text-primary"><?= Yii::t('app', 'EVENT_MODEL_DURATION') ?></div>
                        <p class="font-weight-regular">
                            <?= Yii::$app->formatter->asDate($model->duration, "HH:mm") ?>
                        </p>
                    </li>
                    <li>
                        <div class="heading-6 title text-primary"><?= Yii::t('app', 'EVENT_MODEL_LOCATION') ?></div>
                        <p class="font-weight-regular"><?= $model->location ?></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>