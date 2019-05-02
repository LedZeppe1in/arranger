<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'EVENTS_PAGE_TITLE');

$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $i = 1; ?>
<?php foreach ($model as $item): ?>
    <?php if ($i == 1): ?><div class="row"><?php endif; ?>
    <div class="col-sm-4">
        <div class="text-block">
            <a href="event-view/<?= $item->id ?>" class="text-title"><?= $item->name ?></a>
            <div class="text-date"><?= Yii::$app->formatter->asDate($item->date, "dd MMMM Y, HH:mm") ?></div>
            <div>
                <i><?= Yii::t('app', 'EVENT_MODEL_DURATION') . ': ' ?></i>
                <?= Yii::$app->formatter->asDate($item->duration, "HH:mm") ?>
            </div>
            <div>
                <i><?= Yii::t('app', 'EVENT_MODEL_LOCATION') . ': ' ?></i>
                <?= $item->location ?>
            </div>
        </div><br />
    </div>
    <?php if ($i == 3): ?></div><?php $i = 0; ?><?php endif; ?>
    <?php $i++; ?>
<?php endforeach; ?>