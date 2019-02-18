<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Event */

$this->title = Yii::t('app', 'EVENTS_ADMIN_PAGE_EVENT') . ' - ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'EVENTS_ADMIN_PAGE_EVENTS'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?= $this->render('_modal_form_events', ['model' => $model]) ?>

<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'BUTTON_UPDATE'),
            ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'BUTTON_DELETE'), ['#'], [
            'class' => 'btn btn-danger',
            'data-toggle'=>'modal',
            'data-target'=>'#removeEventModalForm'
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'attribute' => 'date',
                'format' => ['date', 'dd.MM.Y HH:mm']
            ],
            [
                'attribute' => 'duration',
                'format' => ['time', 'HH:mm']
            ],
            'location',
            [
                'label' => Yii::t('app', 'EVENT_MODEL_LINK'),
                'value' => Html::a($model->link, $model->link),
                'format' => 'raw'
            ],
            [
                'label' => Yii::t('app', 'EVENT_MODEL_DESCRIPTION'),
                'value' => $model->description,
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>