<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Project */
/* @var $dataProvider app\modules\main\controllers\DefaultController */

use yii\widgets\ListView;

$this->title = Yii::t('app', 'PROJECTS_PAGE_TITLE');
?>

<!-- Инициализация анимации -->
<script>new WOW().init();</script>

<!-- Breadcrumbs Section -->
<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(/web/images/breadcrumbs-project.jpg);">
    <div class="container">
        <h3 class="breadcrumbs-custom-title"><?= $this->title ?></h3>
        <pre-footer-classic class="breadcrumbs-custom-subtitle">
            <?= Yii::t('app', 'PROJECTS_PAGE_TEXT') ?>
        </pre-footer-classic>
    </div>
</section>

<!-- Projects Section -->
<section class="section section-md bg-default">
    <div class="container container container-custom-width-1">
        <?php echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('_projects_list', [
                    'model' => $model,
                    'key' => $key,
                    'index' => $index,
                    'widget' => $widget,
                ]);
            },
            'layout' => "{summary}\n{items}\n</div>{pager}",
            'options' => [
                'tag' => 'div',
                'class' => 'row row-30 row-xxl-60 row-flex row-custom',
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