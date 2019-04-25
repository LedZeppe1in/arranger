<?php

/* @var $this yii\web\View */

use yii\bootstrap\Button;
use yii\helpers\Html;

$this->title = Yii::t('app', 'EVENTS_PAGE_TITLE');

$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $i = 1; ?>
<?php foreach ($model as $item): ?>
    <?php if ($i == 1): ?><div class="row"><?php endif; ?>
    <div class="col-sm-4">
        <div class="event-block">
            <a href="event-view/<?= $item->id ?>" class="event-title"><?= $item->name ?></a>
            <div class="event-date"><?= Yii::$app->formatter->asDate($item->date, "dd MMMM Y, HH:mm") ?></div>
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
    <?php
        if ($i == 3) {
            echo '</div>';
            $i = 0;
        }
        $i++;
    ?>
<?php endforeach; ?>