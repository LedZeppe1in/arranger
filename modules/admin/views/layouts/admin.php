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
use app\modules\admin\models\User;

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
    <div class="admin-wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->language == 'ru-RU' ? User::find()->one()->full_name_ru :
                User::find()->one()->full_name_en,
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
                ['label' => '<span class="glyphicon glyphicon-list-alt"></span> ' .
                    Yii::t('app', 'NAV_ADMIN_SHEET_MUSIC'), 'url' => ['/admin/sheet-music/list']],
                ['label' => '<span class="glyphicon glyphicon-music"></span> ' .
                    Yii::t('app', 'NAV_ADMIN_MUSIC_TRACKS'), 'url' => ['/admin/music-tracks/list']],
                ['label' => '<span class="glyphicon glyphicon-file"></span> ' .
                    Yii::t('app', 'NAV_ADMIN_SERVICES'), 'url' => ['/admin/services/list']],
                ['label' => '<span class="glyphicon glyphicon-bullhorn"></span> ' .
                    Yii::t('app', 'NAV_ADMIN_EVENTS'), 'url' => ['/admin/events/list']],
                ['label' => '<span class="glyphicon glyphicon-blackboard"></span> ' .
                    Yii::t('app', 'NAV_ADMIN_PROJECTS'), 'url' => ['/admin/projects/list']],
                ['label' => '<span class="glyphicon glyphicon-file"></span> ' .
                    Yii::t('app', 'NAV_ADMIN_PUBLICATIONS'), 'url' => ['/admin/publications/list']],
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
                'homeLink' => ['label' => Yii::t('app', 'NAV_HOME'), 'url' => ['user/profile']],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="admin-footer">
        <div class="container">
            <p class="pull-left">
                <?= Yii::$app->language == 'ru-RU' ? Yii::t('app', 'FOOTER_COPYRIGHT') . ' &copy; ' . date('Y') . ' ' .
                    User::find()->one()->full_name_ru : Yii::t('app', 'FOOTER_COPYRIGHT') . ' &copy; ' . date('Y') .
                    ' ' . User::find()->one()->full_name_en ?> | <?= '<a href="mailto:' .
                Yii::$app->params['adminEmail'] . '">' . Yii::t('app', 'FOOTER_POWERED_BY') . ' ' .
                Yii::t('app', 'FOOTER_DEVELOPER') . '</a>' ?>
            </p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>

</html>

<?php $this->endPage() ?>