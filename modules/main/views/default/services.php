<?php

/* @var $this yii\web\View */
/* @var $dataProvider app\modules\main\controllers\DefaultController */

use yii\widgets\ListView;

$this->title = Yii::t('app', 'SERVICES_PAGE_TITLE');
?>

<!-- Breadcrumbs Section -->
<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(/web/images/breadcrumbs-service.jpg);">
    <div class="container">
        <h3 class="breadcrumbs-custom-title"><?= $this->title ?></h3>
        <pre-footer-classic class="breadcrumbs-custom-subtitle">
            <?= Yii::t('app', 'SERVICES_PAGE_TEXT') ?>
        </pre-footer-classic>
    </div>
</section>

<!-- Service Section -->
<section class="section section-lg bg-default">
    <div class="container">
        <h3 class="custom-title"><?= Yii::t('app', 'SERVICES_PAGE_TITLE') ?></h3>
        <?php echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_services_list',
            'layout' => "{summary}\n{items}\n</table>{pager}",
            'options' => [
                'tag' => 'table',
                'class' => 'table-custom table-custom-responsive',
            ],
            'summary' => '',
            'itemOptions' => [
                'tag' => false,
            ],
            'pager' => [
                'prevPageLabel' => '<span class="icon" aria-hidden="true"></span>',
                'nextPageLabel' => '<span class="icon" aria-hidden="true"></span>',
                'linkOptions' => ['class' => 'page-link'],
                'pageCssClass' => 'page-item',
                'activePageCssClass' => 'active',
                'prevPageCssClass' => 'page-item page-item-control',
                'nextPageCssClass' => 'page-item page-item-control',
            ],
        ]); ?>
    </div>
</section>