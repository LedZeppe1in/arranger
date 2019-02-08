<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */

$this->title = Yii::t('app', 'USER_ADMIN_PAGE_MY_PROFILE');

$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="account-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-edit"></span> ' .
            Yii::t('app', 'USER_ADMIN_PAGE_BUTTON_UPDATE_DATA'), ['update-profile'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' .
            Yii::t('app', 'USER_ADMIN_PAGE_BUTTON_UPDATE_PASSWORD'),
                ['update-password'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'created_at',
                'format' => ['date', 'dd.MM.Y HH:mm']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'dd.MM.Y HH:mm']
            ],
            'username',
            'full_name',
            'email:email',
            'phone',
            [
                'label' => Yii::t('app', 'USER_MODEL_YOUTUBE_LINK'),
                'value' => Html::a($model->youtube_link, $model->youtube_link),
                'format' => 'raw'
            ],
            [
                'label' => Yii::t('app', 'USER_MODEL_INSTAGRAM_LINK'),
                'value' => Html::a($model->instagram_link, $model->instagram_link),
                'format' => 'raw'
            ],
            [
                'label' => Yii::t('app', 'USER_MODEL_FACEBOOK_LINK'),
                'value' => Html::a($model->facebook_link, $model->facebook_link),
                'format' => 'raw'
            ],
            [
                'label' => Yii::t('app', 'USER_MODEL_TWITTER_LINK'),
                'value' => Html::a($model->twitter_link, $model->twitter_link),
                'format' => 'raw'
            ],
            [
                'label' => Yii::t('app', 'USER_MODEL_VK_LINK'),
                'value' => Html::a($model->vk_link, $model->vk_link),
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>