<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SheetMusic */

$this->title = Yii::t('app', 'POP_MUSIC_PAGE_TITLE') . ' - ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'POP_MUSIC_PAGE_TITLE'), 'url' => ['pop-music']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="pop-music-view">
    <h1><?= $model->name ?></h1>

    <div class="text-field">
        <i><?= Yii::t('app', 'SHEET_MUSIC_MODEL_TYPE') . ': ' ?></i>
        <?= $model->getTypeName() ?>
    </div>

    <div class="text-field">
        <i><?= Yii::t('app', 'SHEET_MUSIC_MODEL_PRICE') . ': ' ?></i>
        <?= $model->price ?>
    </div>

    <?php if($model->description): ?>
        <div class="text-field">
            <i><?= Yii::t('app', 'SHEET_MUSIC_MODEL_DESCRIPTION') . ': ' ?></i>
            <div><?= $model->description ?></div>
        </div>
    <?php endif ?>

    <div class="text-field">
        <i><?= Yii::t('app', 'SHEET_MUSIC_MODEL_PREVIEW') . ': ' ?></i>
        <div class="image-block">
            <?php echo Html::img('@web/uploads/sheet-music/' .$model->id . '/' . basename($model->preview),
                ['class' => 'pull-left img-responsive']); ?>
        </div>
    </div>
</div>