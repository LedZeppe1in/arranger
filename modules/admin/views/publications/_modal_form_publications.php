<?php

/* @var $model app\modules\admin\models\Publication */

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\Button;
use yii\widgets\ActiveForm;

Modal::begin([
    'id' => 'removePublicationModalForm',
    'header' => '<h3>' . Yii::t('app', 'PUBLICATIONS_ADMIN_PAGE_DELETE_PUBLICATION') . '</h3>',
]); ?>

    <div class="modal-body">
        <p style="font-size: 14px">
            <?php echo Yii::t('app', 'PUBLICATIONS_ADMIN_PAGE_MODAL_FORM_TEXT'); ?>
        </p>
    </div>

    <?php $form = ActiveForm::begin([
        'id' => 'delete-publication-form',
        'method' => 'post',
        'action' => ['/publications/delete/' . $model->id],
        'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
    ]); ?>

    <?= Html::submitButton('<span class="glyphicon glyphicon-ok"></span> ' . Yii::t('app', 'BUTTON_DELETE'),
        ['class' => 'btn btn-danger']) ?>

    <?= Button::widget([
        'label' => '<span class="glyphicon glyphicon-remove"></span> ' .Yii::t('app', 'BUTTON_CANCEL'),
        'encodeLabel' => false,
        'options' => [
            'class' => 'btn-primary',
            'style' => 'margin:5px',
            'data-dismiss'=>'modal'
        ]
    ]); ?>

    <?php ActiveForm::end(); ?>

<?php Modal::end(); ?>