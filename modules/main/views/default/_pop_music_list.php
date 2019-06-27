<?php use yii\helpers\StringHelper; ?>

<div class="text-block">
    <a href="pop-music-view/<?= $model->id ?>" class="text-title"><?= $model->name ?></a>
    <div>
        <i><?= Yii::t('app', 'SHEET_MUSIC_MODEL_PRICE') . ': ' ?></i>
        <?= $model->price ?>
        <div><?= StringHelper::truncate($model->description, 100, '...') ?></div>
    </div>
</div><br />