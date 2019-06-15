<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SheetMusic */

$this->title = Yii::t('app', 'BIG_BAND_PAGE_TITLE') . ' - ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'BIG_BAND_PAGE_TITLE'), 'url' => ['big-band']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="big-band-view">
    <h1><?= $model->name ?></h1>

    <div class="text-field">
        <i><?= Yii::t('app', 'SHEET_MUSIC_MODEL_TYPE') . ': ' ?></i>
        <?= $model->getTypeName() ?>
    </div>

    <div class="text-field">
        <i><?= Yii::t('app', 'SHEET_MUSIC_MODEL_PRICE') . ': ' ?></i>
        <?= $model->price ?>
    </div>

    <div class="text-field">
        <i><?= Yii::t('app', 'SHEET_MUSIC_MODEL_DESCRIPTION') . ': ' ?></i>
        <div><?= $model->description ?></div>
    </div>

    <div class="text-field">
        <i><?= Yii::t('app', 'SHEET_MUSIC_MODEL_FILE') . ': ' ?></i>
        <div>
            <?= \yii2assets\pdfjs\PdfJs::widget([
                'url'=> Url::base() . '/uploads/sheet-music/' . $model->id . '/' . basename($model->file),
                'buttons'=>[
                    'presentationMode' => false,
                    'openFile' => false,
                    'print' => false,
                    'download' => false,
                    'viewBookmark' => false,
                    'secondaryToolbarToggle' => false
                ]
            ]); ?>
        </div>
    </div>
</div>