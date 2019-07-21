<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SheetMusic */

$this->title = Yii::t('app', 'SHEET_MUSIC_ADMIN_PAGE_CREATE_SHEET_MUSIC');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'SHEET_MUSIC_ADMIN_PAGE_SHEET_MUSIC'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sheet-music-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>