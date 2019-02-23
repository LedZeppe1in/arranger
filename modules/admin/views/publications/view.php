<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Publication */

$this->title = Yii::t('app', 'PUBLICATIONS_ADMIN_PAGE_PUBLICATION') . ' - ' .  $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'PUBLICATIONS_ADMIN_PAGE_PUBLICATIONS'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?= $this->render('_modal_form_publications', ['model' => $model]) ?>

<div class="publication-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'BUTTON_UPDATE'),
            ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'BUTTON_DELETE'), ['#'], [
            'class' => 'btn btn-danger',
            'data-toggle'=>'modal',
            'data-target'=>'#removePublicationModalForm'
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'label' => Yii::t('app', 'PUBLICATION_MODEL_LINK'),
                'value' => Html::a($model->link, $model->link),
                'format' => 'raw'
            ],
            [
                'label' => Yii::t('app', 'PUBLICATION_MODEL_TEXT'),
                'value' => $model->text,
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
