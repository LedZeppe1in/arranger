<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Project */

$this->title = Yii::t('app', 'PROJECTS_ADMIN_PAGE_PROJECT') . ' - ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'PROJECTS_ADMIN_PAGE_PROJECTS'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?= $this->render('_modal_form_projects', ['model' => $model]) ?>

<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'BUTTON_UPDATE'),
            ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'BUTTON_DELETE'), ['#'], [
            'class' => 'btn btn-danger',
            'data-toggle'=>'modal',
            'data-target'=>'#removeProjectModalForm'
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'label' => Yii::t('app', 'PROJECT_MODEL_LINK'),
                'value' => Html::a($model->link, $model->link),
                'format' => 'raw'
            ],
            'description',
        ],
    ]) ?>

</div>
