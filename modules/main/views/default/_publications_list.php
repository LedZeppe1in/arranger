<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Publication */
/* @var $index app\modules\main\controllers\DefaultController */

use yii\helpers\Html;
use yii\helpers\StringHelper;
?>

<?php if($index == 0): ?>
<div class="col-sm-6 col-md-4 wow fadeInUp" style="visibility: hidden; animation-name: none;">
    <?php endif; ?>

<?php if($index == 3 || $index == 6): ?>
    <div class="col-sm-6 col-md-4 wow fadeInUp" data-wow-delay="0.2s" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
<?php endif; ?>

<?php if($index == 1 || $index == 4 || $index == 7): ?>
    <div class="col-sm-6 col-md-4 wow fadeInUp" data-wow-delay="0.4s" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
<?php endif; ?>

<?php if($index == 2 || $index == 5 || $index == 8): ?>
    <div class="col-sm-6 col-md-4 wow fadeInUp" data-wow-delay="0.6s" style="visibility: hidden; animation-delay: 0.6s; animation-name: none;">
<?php endif; ?>

    <div class="blurb-boxed">
        <div class="blurb-boxed-header">
            <h5 class="blurb-boxed-title"><?= Html::a($model->name, ['/publication-view/' . $model->id]) ?></h5>
            <div class="blurb-boxed-icon linearicons-pencil"></div>
        </div>
        <ul class="blurb-boxed-list">
            <li><?= StringHelper::truncate($model->text, 100, '...') ?></li>
        </ul>
        <?= Html::a(Yii::t('app', 'BUTTON_VIEW'), ['/publication-view/' . $model->id],
            ['class' => 'button button-default']) ?>
    </div>
</div>