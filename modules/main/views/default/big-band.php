<?php

/* @var $this yii\web\View */
/* @var $dataProvider app\modules\main\controllers\DefaultController */

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = Yii::t('app', 'BIG_BAND_PAGE_TITLE');

$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php echo ListView::widget([
    'dataProvider' => $dataProvider,
    'beforeItem' => function ($model , $key , $index , $widget) {
        if (($index == 0) || (($index % 3) == 0))
            return '<div class="row">';
        return false;
    },
    'afterItem' => function ($model , $key , $index , $widget) {
        if (($index + 1) % 3 == 0)
            return '</div>';
        return false;
    },
    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('_big_band_list', [
            'model' => $model,
            'key' => $key,
            'index' => $index,
            'widget' => $widget,
        ]);
    },
    'options' => [
        'tag' => 'div',
        'id' => 'big-band-list',
    ],
    'itemOptions' => [
        'tag' => 'div',
        'class' => 'col-sm-4',
    ],
]); ?>