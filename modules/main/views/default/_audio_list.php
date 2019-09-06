<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\MusicTrack */

use yii\helpers\Html;
use yii\helpers\StringHelper;
use app\modules\admin\models\MusicTrack;
?>

<tr>
    <td><div class="icon icon-md icon-gray-300 linearicons-mic"></div></td>
    <td>
        <div class="heading-5">
            <?php
                if ($model->type == MusicTrack::TYPE_JINGLE)
                    echo Html::a($model->name, ['/jingle-view/' . $model->id]);
                if ($model->type == MusicTrack::TYPE_STEMS)
                    echo Html::a($model->name, ['/stem-view/' . $model->id]);
                if ($model->type == MusicTrack::TYPE_MINUS_ONE)
                    echo Html::a($model->name, ['/minus-one-view/' . $model->id]);
            ?>
        </div>
    </td>
    <td>
        <div class="big exeption"><?= $model->getTypeName() ?></div>
    </td>
    <td>
        <div class="big exeption">
            <?php
            if ($model->description != '')
                echo StringHelper::truncate($model->description, 100, '...');
            else
                echo Yii::t('app', 'GENERAL_NOTICE_NO_DESCRIPTION');
            ?>
        </div>
    </td>
    <td>
        <div class="price-box-minimal">
            <div class="heading-5 price">&#8381; <?= $model->price ?></div>
        </div>
    </td>
</tr>