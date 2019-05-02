<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Event */

$this->title = Yii::t('app', 'EVENT_PAGE_TITLE') . ' - ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'EVENTS_PAGE_TITLE'), 'url' => ['events']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="event-view">
    <h1><?= $model->name ?></h1>

    <div class="text-field">
        <b><?= Yii::$app->formatter->asDate($model->date, "dd MMMM Y, HH:mm") ?></b>
    </div>

    <div class="text-field">
        <i><?= Yii::t('app', 'EVENT_MODEL_DURATION') . ': ' ?></i>
        <?= Yii::$app->formatter->asDate($model->duration, "HH:mm") ?>
    </div>

    <div class="text-field">
        <i><?= Yii::t('app', 'EVENT_MODEL_LOCATION') . ': ' ?></i>
        <?= $model->location ?>
    </div>

    <div class="text-field">
        <i><?= Yii::t('app', 'READ_MORE') . ': ' ?></i>
        <a href="<?= $model->link ?>" ><?= $model->link ?></a>
    </div>

    <div class="text-field">
        <i><?= Yii::t('app', 'EVENT_MODEL_DESCRIPTION') . ': ' ?></i>
        <div><?= $model->description ?></div>
    </div>
</div>