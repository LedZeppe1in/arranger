<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\MusicTrack;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\MusicTrackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'MUSIC_TRACKS_ADMIN_PAGE_MUSIC_TRACKS');

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="music-track-list">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-edit"></span> ' .
            Yii::t('app', 'MUSIC_TRACKS_ADMIN_PAGE_CREATE_MUSIC_TRACK'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            [
                'attribute'=>'type',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->getTypeName();
                },
                'filter'=>MusicTrack::getTypesArray(),
            ],
            'duration',
            'price',
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'action-column'],
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>
</div>