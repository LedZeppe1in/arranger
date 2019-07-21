<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use app\modules\admin\models\SheetMusic;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SheetMusic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sheet-music-form">

    <?php $form = ActiveForm::begin([
        'id' => $model->isNewRecord ? 'create-sheet-music-form' : 'update-sheet-music-form',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(SheetMusic::getTypesArray()) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'sheet_music_file')->fileInput() ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 10],
        'preset' => 'basic'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-floppy-disk"></span> ' .
            Yii::t('app', 'BUTTON_SAVE') : '<span class="glyphicon glyphicon-refresh"></span> ' .
                Yii::t('app', 'BUTTON_UPDATE'), ['class' => 'btn btn-success',
                    'name'=>$model->isNewRecord ? 'create-sheet-music-button' : 'update-sheet-music-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>