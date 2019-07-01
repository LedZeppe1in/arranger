<?php use yii\helpers\StringHelper; ?>

<div class="text-block">
    <a href="publication-view/<?= $model->id ?>" class="text-title"><?= $model->name ?></a>
    <div><?= StringHelper::truncate($model->text, 100, '...') ?></div>
</div><br />