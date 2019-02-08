<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="user-password-form">

    <?php $form = ActiveForm::begin([
        'id' => 'update-user-password-form',
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('<span class="glyphicon glyphicon-refresh"></span> ' . Yii::t('app', 'BUTTON_UPDATE'),
            ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>