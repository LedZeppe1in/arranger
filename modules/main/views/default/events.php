<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'EVENTS_PAGE_TITLE');

$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>



<?php foreach ($model as $model) {?>
    <div class="event-block">
        <div class="event-headline"><?=$model->name?></div>
        <div>
            <b>
            <?= Yii::$app->formatter->asDate($model->date, "php:d.m.Y") . ' , '
            . Yii::$app->formatter->asTime($model->date, "php:H:i") ?>
            </b>
        </div>

        <div>
            <b>
                <?=
                Yii::$app->formatter->asDate($model->date, "dd MMMM yyyy") . ' , '
                . Yii::$app->formatter->asDatetime($model->date, "php:H:i");
                ?>
            </b>
        </div>

        <div><?= Yii::t('app', 'EVENT_MODEL_DURATION') . ': ' . $model->duration?></div>
        <div><?= Yii::t('app', 'EVENT_MODEL_LOCATION') . ': ' . $model->location?></div>
        <div class="event-linkline"><?= Html::a($model->link)?></div>
        <div><?=$model->description?></div>
    </div>
<?php } ?>

