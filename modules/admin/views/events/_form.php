<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use dosamigos\ckeditor\CKEditor;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\modules\admin\models\Event */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin([
        'id' => $model->isNewRecord ? 'create-event-form' : 'update-event-form',
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->widget(DateTimePicker::classname(),[
        'pluginOptions' => [
            'format' => 'dd.mm.yyyy hh:ii',
            'autoclose' => true
        ]
    ]); ?>

    <?= $form->field($model, 'duration')->widget(TimePicker::className(), [
        'pluginOptions' => [
            'showSeconds' => false,
            'showMeridian' => false,
            'minuteStep' => 1,
            'template' => false
        ]
    ]); ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 10],
        'preset' => 'basic'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-floppy-disk"></span> ' .
            Yii::t('app', 'BUTTON_SAVE') : '<span class="glyphicon glyphicon-refresh"></span> ' .
                Yii::t('app', 'BUTTON_UPDATE'), ['class' => 'btn btn-success',
                    'name'=>$model->isNewRecord ? 'create-event-button' : 'update-event-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>