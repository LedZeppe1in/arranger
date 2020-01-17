<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\MusicTrack */

$this->title = Yii::t('app', 'MUSIC_TRACKS_ADMIN_PAGE_UPDATE_MUSIC_TRACK');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'MUSIC_TRACKS_ADMIN_PAGE_MUSIC_TRACKS'), 'url' => ['list']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'MUSIC_TRACKS_ADMIN_PAGE_MUSIC_TRACK') . ' - ' .
    $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="audio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>