<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Service */

$this->title = Yii::t('app', 'SERVICES_ADMIN_PAGE_CREATE_SERVICE');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'SERVICES_ADMIN_PAGE_SERVICES'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>