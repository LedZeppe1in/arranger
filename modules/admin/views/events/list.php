<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'EVENTS_ADMIN_PAGE_EVENTS');

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="events-list">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::a('<span class="glyphicon glyphicon-edit"></span> ' . Yii::t('app', 'EVENTS_ADMIN_PAGE_CREATE_EVENT'),
            ['create'], ['class' => 'btn btn-success']) ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
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
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'action-column'],
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>
</div>