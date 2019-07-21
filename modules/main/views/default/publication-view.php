<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Publication */

$this->title = Yii::t('app', 'PUBLICATION_PAGE_TITLE') . ' - ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'PUBLICATIONS_PAGE_TITLE'), 'url' => ['publications']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="publication-view">
    <h1><?= $model->name ?></h1>

    <div class="text-field">
        <i><?= Yii::t('app', 'READ_MORE') . ': ' ?></i>
        <a href="<?= $model->link ?>" ><?= $model->link ?></a>
    </div>

    <div class="text-field">
        <i><?= Yii::t('app', 'PUBLICATION_MODEL_TEXT') . ': ' ?></i>
        <div><?= $model->text ?></div>
    </div>
</div>