<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\StringHelper;

$this->title = Yii::t('app', 'PUBLICATIONS_PAGE_TITLE');

$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $i = 1; ?>
<?php foreach ($model as $item): ?>
    <?php if ($i == 1): ?><div class="row"><?php endif; ?>
    <div class="col-sm-4">
        <div class="text-block">
            <a href="publication-view/<?= $item->id ?>" class="text-title"><?= $item->name ?></a>
            <div><?= StringHelper::truncate($item->text, 100, '...') ?></div>
        </div><br />
    </div>
    <?php if ($i == 3): ?></div><?php $i = 0; ?><?php endif; ?>
    <?php $i++; ?>
<?php endforeach; ?>