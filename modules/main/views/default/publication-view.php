<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Publication */

use yii\helpers\Html;

$this->title = Yii::t('app', 'PUBLICATION_PAGE_TITLE');
?>

<!-- Breadcrumbs Section -->
<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(/web/images/breadcrumbs-publication.jpg);">
    <div class="container">
        <h3 class="breadcrumbs-custom-title"><?= $this->title ?></h3>
        <pre-footer-classic class="breadcrumbs-custom-subtitle">
            <?= Yii::t('app', 'PUBLICATION_PAGE_TEXT') ?>
        </pre-footer-classic>
    </div>
</section>

<!-- Project Section -->
<section class="section section-lg bg-default">
    <div class="container">
        <div class="row row-50 justify-content-between">
            <div class="col-md-7">
                <h3 class="custom-title"><?= $model->name ?></h3>
                <p class="big"><?= $model->text ?></p><br />
                <?php if($model->link != '') {
                    echo Html::a(Yii::t('app', 'BUTTON_READ_MORE'), $model->link,
                        ['class' => 'button button-default offset-left-106']);
                } ?>
                <?= Html::a(Yii::t('app', 'BUTTON_VIEW_MORE_INFO'), ['/main/default/publications'],
                    ['class' => 'button button-default offset-left-106']) ?>
            </div>
        </div>
    </div>
</section>