<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SheetMusic */

$this->title = Yii::t('app', 'SHEET_MUSIC_ADMIN_PAGE_SHEET_MUSIC_ONE') . ' - ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'SHEET_MUSIC_ADMIN_PAGE_SHEET_MUSIC'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?= $this->render('_modal_form_sheet_music', ['model' => $model]) ?>

<div class="sheet-music-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' .
            Yii::t('app', 'SHEET_MUSIC_ADMIN_PAGE_BUTTON_VIEW_SHEET_MUSIC_PDF'), ['#'], [
            'class' => 'btn btn-success',
            'data-toggle'=>'modal',
            'data-target'=>'#viewSheetMusicPDFModalForm'
        ]) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'BUTTON_UPDATE'),
            ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'BUTTON_DELETE'), ['#'], [
            'class' => 'btn btn-danger',
            'data-toggle'=>'modal',
            'data-target'=>'#removeSheetMusicModalForm'
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'attribute'=>'type',
                'value' => $model->getTypeName(),
            ],
            'price',
            [
                'label' => Yii::t('app', 'SHEET_MUSIC_MODEL_DESCRIPTION'),
                'value' => $model->description,
                'format' => 'raw'
            ],
            [
                'label' => Yii::t('app', 'SHEET_MUSIC_MODEL_PREVIEW'),
                'value' => Html::img('@web/uploads/sheet-music/' .$model->id . '/' . basename($model->preview),
                    ['class' => 'image-block']),
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>