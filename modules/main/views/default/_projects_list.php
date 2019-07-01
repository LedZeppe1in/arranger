<?php use yii\helpers\StringHelper; ?>

<div class="text-block">
    <a href="project-view/<?= $model->id ?>" class="text-title"><?= $model->name ?></a>
    <div><?= StringHelper::truncate($model->description, 100, '...') ?></div>
</div><br />