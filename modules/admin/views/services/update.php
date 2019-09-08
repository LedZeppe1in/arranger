<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Service */

$this->title = Yii::t('app', 'SERVICES_ADMIN_PAGE_UPDATE_SERVICE');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'SERVICES_ADMIN_PAGE_SERVICES'), 'url' => ['list']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'SERVICES_ADMIN_PAGE_SERVICE') . ' - ' . $model->name,
    'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>