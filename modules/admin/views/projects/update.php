<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Project */

$this->title = Yii::t('app', 'PROJECTS_ADMIN_PAGE_UPDATE_PROJECT');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'PROJECTS_ADMIN_PAGE_PROJECTS'), 'url' => ['list']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'PROJECTS_ADMIN_PAGE_PROJECT') . ' - ' . $model->name,
    'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>