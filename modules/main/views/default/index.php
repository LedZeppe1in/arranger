<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */

use yii\helpers\Html;
use yii\bootstrap\Carousel;

$this->title = Yii::t('app', 'FIRST_NAME') . ' ' . Yii::t('app', 'LAST_NAME');
?>

<div class="site-index">
    <?php echo Carousel::widget ( [
        'items' => [
            ['content' => Html::img('@web/images/pic1.jpg')],
            ['content' => Html::img('@web/images/pic2.jpg')],
            ['content' => Html::img('@web/images/pic3.jpg')]
        ],
    ]); ?>
    <div class="body-content">
        <?= Yii::$app->language == 'ru-RU' ? $model->biography_ru : $model->biography_en ?>
    </div>
</div>