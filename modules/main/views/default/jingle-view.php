<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\MusicTrack */

$this->title = Yii::t('app', 'JINGLES_PAGE_TITLE') . ' - ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'JINGLES_PAGE_TITLE'), 'url' => ['jingles']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="jingles-view">
    <h1><?= $model->name ?></h1>

    <div class="text-field">
        <i><?= Yii::t('app', 'MUSIC_TRACK_MODEL_TYPE') . ': ' ?></i>
        <?= $model->getTypeName() ?>
    </div>

    <div class="text-field">
        <i><?= Yii::t('app', 'MUSIC_TRACK_MODEL_DURATION') . ': ' ?></i>
        <?= $model->duration ?>
    </div>

    <div class="text-field">
        <i><?= Yii::t('app', 'MUSIC_TRACK_MODEL_PRICE') . ': ' ?></i>
        <?= $model->price ?>
    </div>

    <?php if($model->description): ?>
        <div class="text-field">
            <i><?= Yii::t('app', 'MUSIC_TRACK_MODEL_DESCRIPTION') . ': ' ?></i>
            <div><?= $model->description ?></div>
        </div>
    <?php endif ?>
</div>