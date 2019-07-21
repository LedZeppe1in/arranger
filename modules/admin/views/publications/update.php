<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Publication */

$this->title = Yii::t('app', 'PUBLICATIONS_ADMIN_PAGE_UPDATE_PUBLICATION');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'PUBLICATIONS_ADMIN_PAGE_PUBLICATIONS'), 'url' => ['list']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'PUBLICATIONS_ADMIN_PAGE_PUBLICATION') . ' - ' . $model->name,
    'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="publication-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>