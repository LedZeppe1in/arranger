<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */

$this->title = Yii::t('app', 'USER_ADMIN_PAGE_MY_BIOGRAPHY');

$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="account-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-edit"></span> ' .
            Yii::t('app', 'USER_ADMIN_PAGE_BUTTON_UPDATE_BIOGRAPHY'),
                ['update-biography'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="well"><?= $model->biography ?></div>

</div>