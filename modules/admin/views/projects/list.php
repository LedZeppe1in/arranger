<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'PROJECTS_ADMIN_PAGE_PROJECTS');

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="project-list">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-edit"></span> ' .
            Yii::t('app', 'PROJECTS_ADMIN_PAGE_CREATE_PROJECT'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            [
                'attribute'=>'link',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->getLink();
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'action-column'],
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>
</div>