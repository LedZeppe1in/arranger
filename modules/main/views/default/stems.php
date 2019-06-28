<?php

/* @var $this yii\web\View */
/* @var $dataProvider app\modules\main\controllers\DefaultController */

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = Yii::t('app', 'STEMS_PAGE_TITLE');

$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php echo ListView::widget([
    'dataProvider' => $dataProvider,
    'beforeItem' => function ($model , $key , $index , $widget) {
        if (($index == 0) || (($index + 1) % 4 == 0))
            return '<div class="row">';
        return false;
    },
    'afterItem' => function ($model , $key , $index , $widget) {
        if (($index + 1) % 3 == 0)
            return '</div>';
        return false;
    },
    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('_stems_list', [
            'model' => $model,
            'key' => $key,
            'index' => $index,
            'widget' => $widget,
        ]);
    },
    'options' => [
        'tag' => 'div',
        'id' => 'stems-list',
    ],
    'itemOptions' => [
        'tag' => 'div',
        'class' => 'col-sm-4',
    ],
]); ?>