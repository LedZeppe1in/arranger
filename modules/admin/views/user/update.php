<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */

$this->title = Yii::t('app', 'USER_ADMIN_PAGE_UPDATE_DATA');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'USER_ADMIN_PAGE_ACCOUNT'), 'url' => ['account']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="account-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>