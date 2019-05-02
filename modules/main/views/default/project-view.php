<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Project */

$this->title = Yii::t('app', 'PROJECT_PAGE_TITLE') . ' - ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'PROJECTS_PAGE_TITLE'), 'url' => ['projects']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="project-view">
    <h1><?= $model->name ?></h1>

    <div class="project-field">
        <i><?= Yii::t('app', 'READ_MORE') . ': ' ?></i>
        <a href="<?= $model->link ?>" ><?= $model->link ?></a>
    </div>

    <div class="project-field">
        <i><?= Yii::t('app', 'PROJECT_MODEL_DESCRIPTION') . ': ' ?></i>
        <div><?= $model->description ?></div>
    </div>
</div>