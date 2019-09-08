<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use dosamigos\ckeditor\CKEditor;
use app\modules\admin\models\MusicTrack;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\MusicTrack */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audio-form">

    <?php $form = ActiveForm::begin([
        'id' => $model->isNewRecord ? 'create-music-track-form' : 'update-music-track-form',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(MusicTrack::getTypesArray()) ?>

    <?= $form->field($model, 'duration')->widget(TimePicker::className(), [
        'pluginOptions' => [
            'showSeconds' => false,
            'showMeridian' => false,
            'minuteStep' => 1,
            'template' => false
        ]
    ]); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'preview_file')->fileInput() ?>

    <?= $form->field($model, 'music_track_file')->fileInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 8]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-floppy-disk"></span> ' .
            Yii::t('app', 'BUTTON_SAVE') : '<span class="glyphicon glyphicon-refresh"></span> ' .
                Yii::t('app', 'BUTTON_UPDATE'), ['class' => 'btn btn-success',
                    'name'=>$model->isNewRecord ? 'create-music-track-button' : 'update-music-track-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>