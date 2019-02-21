<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin([
        'id' => $model->isNewRecord ? 'create-project-form' : 'update-project-form',
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?php
    /*<?= $form->field($model, 'created_at')->textInput() ?>*/

     /*<?= $form->field($model, 'updated_at')->textInput() ?>*/
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 10],
        'preset' => 'basic'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-floppy-disk"></span> ' .
            Yii::t('app', 'BUTTON_SAVE') : '<span class="glyphicon glyphicon-refresh"></span> ' .
            Yii::t('app', 'BUTTON_UPDATE'), ['class' => 'btn btn-success',
            'name'=>$model->isNewRecord ? 'create-project-button' : 'update-project-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
