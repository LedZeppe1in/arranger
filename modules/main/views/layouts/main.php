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

    <div class="main-wrap">
        <div class="top-menu">
            <div class="container">
                <ul class="top-menu-list">
                    <?php
                        if (Yii::$app->user->isGuest)
                            echo '<li>' . Html::a('<span class="glyphicon glyphicon-log-in"></span> ' .
                                Yii::t('app', 'NAV_SIGN_IN'), ['/main/default/sing-in']) . '</li>';
                        else
                            echo '<li>' . Html::a('<span class="glyphicon glyphicon-home"></span> ' .
                                Yii::t('app', 'NAV_ADMINISTRATION'), ['/admin/user/profile']) . '</li><li>' .
                                Html::beginForm(['/main/default/sing-out'], 'post') .
                                Html::submitButton(
                                    '<span class="glyphicon glyphicon-log-out"></span> ' .
                                    Yii::t('app', 'NAV_ADMIN_SIGN_OUT') . ' (' .
                                    Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                                ) . Html::endForm() . '</li>';
                        echo "<li><form id='top-menu-form'>" . WLang::widget() . "</form></li>";
                    ?>
                </ul>
            </div>
        </div>

        <div class="mask-overlay">
            <div class="container">
                <div class="col-xs-3 caption-text">
                    <?= Html::a('<h2 class="first-name">' . Yii::t('app', 'FIRST_NAME') . '</h2>' .
                        '<h4 class="last-name">' . Yii::t('app', 'LAST_NAME') . '</h4>', ['/main/default/index']) ?>
                </div>
                <div class="col-xs-9 caption-image"></div>
            </div>
        </div>

        <div class="main-menu">
            <div class="container">
                <ul class="main-menu-list">
                    <li class="col-md-2">
                        <?= Html::a(Yii::t('app', 'NAV_EVENTS'), ['/main/default/events']) ?>
                    </li>
                    <li class="col-md-2">
                        <?= Html::a(Yii::t('app', 'NAV_SHEET_MUSIC') .
                            ' <span class="glyphicon glyphicon-chevron-down"></span>') ?>
                        <ul class="main-sub-menu-list">
                            <li>
                                <?= Html::a(Yii::t('app', 'NAV_BIG_BAND'), ['/main/default/big-band']) ?>
                            </li>
                            <li>
                                <?= Html::a(Yii::t('app', 'NAV_JAZZ_COMBO'), ['/main/default/jazz-combo']) ?>
                            </li>
                            <li>
                                <?= Html::a(Yii::t('app', 'NAV_POP_MUSIC'), ['/main/default/pop-music']) ?>
                            </li>
                        </ul>
                    </li>
                    <li class="col-md-2"><?= Html::a(Yii::t('app', 'NAV_MUSIC_TRACKS') .
                            ' <span class="glyphicon glyphicon-chevron-down"></span>') ?>
                        <ul class="main-sub-menu-list">
                            <li>
                                <?= Html::a(Yii::t('app', 'NAV_JINGLES'), ['/main/default/jingles']) ?>
                            </li>
                            <li>
                                <?= Html::a(Yii::t('app', 'NAV_STEMS'), ['/main/default/stems']) ?>
                            </li>
                        </ul>
                    </li>
                    <li class="col-md-2">
                        <?= Html::a(Yii::t('app', 'NAV_PROJECTS'), ['/main/default/projects']) ?>
                    </li>
                    <li class="col-md-2">
                        <?= Html::a(Yii::t('app', 'NAV_PUBLICATIONS'), ['/main/default/publications']) ?>
                    </li>
                    <li class="col-md-2">
                        <?= Html::a(Yii::t('app', 'NAV_CONTACTS'), ['/main/default/contact']) ?>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container">
            <?= Breadcrumbs::widget([
                'options' => ['class' => 'breadcrumb main-breadcrumb'],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="main-footer">
        <div class="container">
            <ul class="social-network-icons">
                <li>
                    <?= Html::a(Html::img('@web/images/y_ruznyaev.png'),
                        User::find()->one()->youtube_link) ?>
                </li>
                <li>
                    <?= Html::a(Html::img('@web/images/i_ruznyaev.png'),
                        User::find()->one()->instagram_link) ?>
                </li>
                <li>
                    <?= Html::a(Html::img('@web/images/f_ruznyaev.png'),
                        User::find()->one()->facebook_link) ?>
                </li>
                <li>
                    <?= Html::a(Html::img('@web/images/t_ruznyaev.png'),
                        User::find()->one()->twitter_link) ?>
                </li>
                <li>
                    <?= Html::a(Html::img('@web/images/v_ruznyaev.png'),
                        User::find()->one()->vk_link) ?>
                </li>
            </ul>
            <p class="footer-text">
                <?= Yii::t('app', 'FOOTER_COPYRIGHT') . ' &copy; ' . date('Y') . ' ' . Yii::t('app', 'FIRST_NAME')
                    . ' ' . Yii::t('app', 'LAST_NAME') ?> | <?= '<a href="mailto:' . Yii::$app->params['adminEmail']
                    . '">' . Yii::t('app', 'FOOTER_POWERED_BY') . ' ' . Yii::t('app', 'FOOTER_DEVELOPER') . '</a>' ?>
            </p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>

</html>

<?php $this->endPage() ?>