<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Service */

$this->title = Yii::t('app', 'SERVICES_ADMIN_PAGE_SERVICE') . ' - ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'SERVICES_ADMIN_PAGE_SERVICES'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?= $this->render('_modal_form_services', ['model' => $model]) ?>

<div class="service-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'BUTTON_UPDATE'),
            ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'BUTTON_DELETE'), ['#'], [
            'class' => 'btn btn-danger',
            'data-toggle'=>'modal',
            'data-target'=>'#removeServiceModalForm'
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'price',
            [
                'label' => Yii::t('app', 'SERVICE_MODEL_DESCRIPTION'),
                'value' => $model->description,
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
