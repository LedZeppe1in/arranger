<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Event */

$this->title = Yii::t('app', 'EVENTS_ADMIN_PAGE_UPDATE_EVENT');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'EVENTS_ADMIN_PAGE_EVENTS'), 'url' => ['list']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'EVENTS_ADMIN_PAGE_EVENT') . ' - ' . $model->name,
    'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>