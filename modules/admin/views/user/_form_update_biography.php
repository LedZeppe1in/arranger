<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-biography-form">

    <?php $form = ActiveForm::begin([
        'id' => 'update-user-biography-form',
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'biography')->widget(CKEditor::className(), [
        'options' => ['rows' => 10],
        'preset' => 'basic'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('<span class="glyphicon glyphicon-refresh"></span> ' . Yii::t('app', 'BUTTON_UPDATE'),
            ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>