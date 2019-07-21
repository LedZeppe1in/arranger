<?php use yii\helpers\StringHelper; ?>

<div class="text-block">
    <a href="jingle-view/<?= $model->id ?>" class="text-title"><?= $model->name ?></a>
    <div>
        <i><?= Yii::t('app', 'MUSIC_TRACK_MODEL_DURATION') . ': ' . $model->duration ?></i><br />
        <i><?= Yii::t('app', 'MUSIC_TRACK_MODEL_PRICE') . ': ' . $model->price ?></i>
    </div>
</div><br />