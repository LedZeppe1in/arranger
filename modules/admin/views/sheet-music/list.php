<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\SheetMusic;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SheetMusicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'SHEET_MUSIC_ADMIN_PAGE_SHEET_MUSIC');

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sheet-music-list">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-edit"></span> ' .
            Yii::t('app', 'SHEET_MUSIC_ADMIN_PAGE_CREATE_SHEET_MUSIC'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            [
                'attribute'=>'type',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->getTypeName();
                },
                'filter'=>SheetMusic::getTypesArray(),
            ],
            'price',
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'action-column'],
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>
</div>