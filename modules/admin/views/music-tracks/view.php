<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\MusicTrack */

$this->title = Yii::t('app', 'MUSIC_TRACKS_ADMIN_PAGE_MUSIC_TRACK') . ' - ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'MUSIC_TRACKS_ADMIN_PAGE_MUSIC_TRACKS'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?= $this->render('_modal_form_music_track', ['model' => $model]) ?>

<div class="music-track-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'BUTTON_UPDATE'),
            ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'BUTTON_DELETE'), ['#'], [
            'class' => 'btn btn-danger',
            'data-toggle'=>'modal',
            'data-target'=>'#removeMusicTrackModalForm'
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'name',
            [
                'attribute'=>'type',
                'value' => $model->getTypeName(),
            ],
            'duration',
            'price',
            [
                'label' => Yii::t('app', 'MUSIC_TRACK_MODEL_PREVIEW'),
                'value' => Html::a($model->preview, $model->preview, ['target' => '_blank']),
                'format' => 'raw'
            ],
            [
                'label' => Yii::t('app', 'MUSIC_TRACK_MODEL_FILE'),
                'value' => Html::a($model->file, $model->file, ['target' => '_blank']),
                'format' => 'raw'
            ],
            [
                'label' => Yii::t('app', 'MUSIC_TRACK_MODEL_DESCRIPTION'),
                'value' => $model->description,
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>