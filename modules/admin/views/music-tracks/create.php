<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\MusicTrack */

$this->title = Yii::t('app', 'MUSIC_TRACKS_ADMIN_PAGE_CREATE_MUSIC_TRACK');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'MUSIC_TRACKS_ADMIN_PAGE_MUSIC_TRACKS'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="music-track-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>