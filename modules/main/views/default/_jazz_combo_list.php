<?php use yii\helpers\StringHelper; ?>

<div class="text-block">
    <a href="jazz-combo-view/<?= $model->id ?>" class="text-title"><?= $model->name ?></a>
    <div>
        <i><?= Yii::t('app', 'SHEET_MUSIC_MODEL_PRICE') . ': ' . $model->price ?></i>
        <div><?= StringHelper::truncate($model->description, 100, '...') ?></div>
    </div>
</div><br />