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
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo "<form class='navbar-form navbar-right'>" . WLang::widget() . "</form>";
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => [
                    ['label' => Yii::t('app', 'NAV_EVENTS'), 'url' => ['/main/default/events']],
                    ['label' => Yii::t('app', 'NAV_SHEET_MUSIC'), 'url' => ['/main/default/sheet-music']],
                    ['label' => Yii::t('app', 'NAV_JINGLES'), 'url' => ['/main/default/jingles']],
                    ['label' => Yii::t('app', 'NAV_STEMS'), 'url' => ['/main/default/stems']],
                    ['label' => Yii::t('app', 'NAV_PROJECTS'), 'url' => ['/main/default/projects']],
                    ['label' => Yii::t('app', 'NAV_PUBLICATIONS'), 'url' => ['/main/default/publications']],
                    ['label' => Yii::t('app', 'NAV_CONTACTS'), 'url' => ['/main/default/contact']]
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    Yii::$app->user->isGuest ? (
                        ['label' => Yii::t('app', 'NAV_SIGN_IN'), 'url' => ['/main/default/sing-in']]
                    ) : (
                        '<li>' . Html::a(Yii::t('app', 'NAV_ADMINISTRATION'), ['/admin/user/profile']) . '</li>' .
                        '<li>'
                        . Html::beginForm(['/main/default/sing-out'], 'post')
                        . Html::submitButton(
                            Yii::t('app', 'NAV_ADMIN_SIGN_OUT') . ' (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'
                    )
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
            <p class="pull-left">
                <?= Yii::t('app', 'FOOTER_COPYRIGHT') . ' &copy; ' . date('Y') . ' ' .
                Yii::$app->name ?> | <?= Yii::t('app', 'FOOTER_POWERED_BY') . ' ' .
                '<a href="mailto:' . Yii::$app->params['adminEmail'] . '">' .
                Yii::t('app', 'FOOTER_DEVELOPER') . '</a>' ?>
            </p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>

</html>

<?php $this->endPage() ?>