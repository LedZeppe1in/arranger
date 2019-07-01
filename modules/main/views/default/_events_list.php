<div class="text-block">
    <a href="event-view/<?= $model->id ?>" class="text-title"><?= $model->name ?></a>
    <div class="text-date"><?= Yii::$app->formatter->asDate($model->date, "dd MMMM Y, HH:mm") ?></div>
    <div>
        <i><?= Yii::t('app', 'EVENT_MODEL_DURATION') . ': ' ?></i>
        <?= Yii::$app->formatter->asDate($model->duration, "HH:mm") ?>
    </div>
    <div>
        <i><?= Yii::t('app', 'EVENT_MODEL_LOCATION') . ': ' ?></i>
        <?= $model->location ?>
    </div>
</div><br />