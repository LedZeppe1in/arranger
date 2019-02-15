<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\widgets\WLang;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    echo "<form class='navbar-form navbar-right'>" . WLang::widget() . "</form>";
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'encodeLabels' => false,
        'items' => [
            ['label' => '<span class="glyphicon glyphicon-bullhorn"></span> ' .
                Yii::t('app', 'NAV_ADMIN_EVENTS'), 'url' => ['/admin/events/list']],
            ['label' => '<span class="glyphicon glyphicon-list-alt"></span> ' .
                Yii::t('app', 'NAV_ADMIN_SHEET_MUSIC'), 'url' => '#'],
            ['label' => '<span class="glyphicon glyphicon-music"></span> ' .
                Yii::t('app', 'NAV_ADMIN_MUSIC_TRACKS'), 'url' => '#'],
            ['label' => '<span class="glyphicon glyphicon-blackboard"></span> ' .
                Yii::t('app', 'NAV_ADMIN_PROJECTS'), 'url' => '#'],
            ['label' => '<span class="glyphicon glyphicon-file"></span> ' .
                Yii::t('app', 'NAV_ADMIN_PUBLICATIONS'), 'url' => '#'],
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            ['label' => '<span class="glyphicon glyphicon-home"></span> ' . Yii::t('app', 'NAV_ADMIN_ACCOUNT'),
                'items' => [
                    ['label' => Yii::t('app', 'NAV_ADMIN_SIGNED_IN_AS')],
                    ['label' => '<b style="font-size:small">' . Yii::$app->user->identity->username . '</b>'],
                    '<li class="divider"></li>',
                    ['label' => '<span class="glyphicon glyphicon-user"></span> ' .
                        Yii::t('app', 'NAV_ADMIN_MY_PROFILE'), 'url' => ['/admin/user/profile']],
                    ['label' => '<span class="glyphicon glyphicon-book"></span> ' .
                        Yii::t('app', 'NAV_ADMIN_MY_BIOGRAPHY'), 'url' => ['/admin/user/biography']],
                    '<li class="divider"></li>',
                    ['label' => '<span class="glyphicon glyphicon-log-out"></span> ' .
                        Yii::t('app', 'NAV_ADMIN_SIGN_OUT'), 'url' => ['/main/default/sing-out'],
                        'linkOptions' => ['data-method' => 'post']],
                ]
            ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left"><?= ' &copy; ' . date('Y') . ' ' . Yii::t('app', 'FOOTER_NAME') ?></p>
        <p class="pull-right"><?= Yii::t('app', 'FOOTER_POWERED_BY') . ' ' .
            ' <a href="mailto:DorodnyxNikita@gmail.com">'.Yii::$app->params['adminEmail'].'</a>' ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>