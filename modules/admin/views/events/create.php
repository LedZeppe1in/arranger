<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Event */

$this->title = Yii::t('app', 'EVENTS_ADMIN_PAGE_CREATE_EVENT');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'EVENTS_ADMIN_PAGE_EVENTS'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>