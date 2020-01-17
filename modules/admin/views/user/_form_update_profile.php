<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="user-data-form">

    <?php $form = ActiveForm::begin([
        'id' => 'update-user-data-form',
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'youtube_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instagram_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facebook_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'twitter_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vk_link')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('<span class="glyphicon glyphicon-refresh"></span> ' . Yii::t('app', 'BUTTON_UPDATE'),
            ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>