<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'PROJECTS_PAGE_TITLE');

$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $i = 1; ?>
<?php foreach ($model as $item): ?>
    <?php if ($i == 1): ?><div class="row"><?php endif; ?>
    <div class="col-sm-4">
        <div class="project-block">
            <a href="project-view/<?= $item->id ?>" class="project-title"><?= $item->name ?></a>
            <div><?= $item->description ?></div>
        </div><br />
    </div>
    <?php if ($i == 3): ?></div><?php $i = 0; ?><?php endif; ?>
    <?php $i++; ?>
<?php endforeach; ?>