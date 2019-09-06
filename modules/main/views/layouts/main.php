<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\ClientAsset;
use app\modules\admin\models\User;

ClientAsset::register($this);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" type="text/css"
          href="//fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7CRoboto:300,300i,400,400i,500,500i,700,700i,900,900i%7CAbril+Fatface">
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

    <!-- Подключение js-скриптов -->
    <?php $this->registerJsFile('/js/core.min.js', ['position' => yii\web\View::POS_END]) ?>
    <?php $this->registerJsFile('/js/script.js', ['position' => yii\web\View::POS_END]) ?>

    <!-- Loading Section -->
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
            <p><?= Yii::t('app', 'LOADING') ?></p>
        </div>
    </div>

    <div class="page animated" style="animation-duration: 500ms;">
        <section class="section section-relative section-header">
            <!-- Header Section -->
            <header class="section header-absolute">
                <!-- RD Navbar -->
                <div class="rd-navbar-wrap" style="height: 93px;">
                    <nav class="rd-navbar rd-navbar-aside rd-navbar-original rd-navbar-static"
                         data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed"
                         data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
                         data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static"
                         data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px"
                         data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true"
                         data-xl-stick-up="true" data-xxl-stick-up="true">
                        <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1 toggle-original"
                             data-rd-navbar-toggle=".rd-navbar-collapse"><span></span>
                        </div>
                        <div class="rd-navbar-collapse toggle-original-elements">
                            <ul class="list rd-navbar-list">
                                <li>
                                    <?= Html::a('', User::find()->one()->youtube_link,
                                        ['class' => 'icon icon-sm icon-bordered link-default mdi mdi-youtube-play']) ?>
                                </li>
                                <li>
                                    <?= Html::a('', User::find()->one()->instagram_link,
                                        ['class' => 'icon icon-sm icon-bordered link-default mdi mdi-instagram']) ?>
                                </li>
                                <li>
                                    <?= Html::a('', User::find()->one()->twitter_link,
                                        ['class' => 'icon icon-sm icon-bordered link-default mdi mdi-twitter']) ?>
                                </li>
                                <li>
                                    <?= Html::a('', User::find()->one()->facebook_link,
                                        ['class' => 'icon icon-sm icon-bordered link-default mdi mdi-facebook']) ?>
                                </li>
                                <li>
                                    <?= Html::a('', User::find()->one()->vk_link,
                                        ['class' => 'icon icon-sm icon-bordered link-default mdi mdi-vk']) ?>
                                </li>
                            </ul>
                        </div>
                        <div class="rd-navbar-main-outer">
                            <div class="rd-navbar-main">
                                <!-- RD Navbar Panel -->
                                <div class="rd-navbar-panel">
                                    <!-- RD Navbar Toggle -->
                                    <button class="rd-navbar-toggle toggle-original"
                                            data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span>
                                    </button>
                                    <!-- RD Navbar Brand -->
                                    <div class="rd-navbar-brand">
                                        <!-- Brand -->
                                        <?= Html::a(
                                            Html::img('@web/images/logo-default-340x130.png',
                                                ['class' => 'brand-logo-dark', 'width' => '137', 'height' => '49']) .
                                            Html::img('@web/images/logo-inverse-246x216.png',
                                                ['class' => 'brand-logo-light', 'width' => '123', 'height' => '108']),
                                            ['/main/default/index'], ['class' => 'brand']) ?>
                                    </div>
                                </div>
                                <div class="rd-navbar-nav-wrap toggle-original-elements">
                                    <!-- RD Navbar Nav -->
                                    <ul class="rd-navbar-nav">
                                        <li class="rd-nav-item rd-navbar--has-dropdown rd-navbar-submenu">
                                            <?= Html::a(Yii::t('app', 'NAV_SHEET_MUSIC'), ['/main/default/sheet-music'],
                                                ['class' => 'rd-nav-link']) ?>
                                            <!-- RD Navbar Dropdown -->
                                            <ul class="rd-menu rd-navbar-dropdown">
                                                <li class="rd-dropdown-item">
                                                    <?= Html::a(Yii::t('app', 'NAV_BIG_BAND'),
                                                        ['/main/default/big-band'], ['class' => 'rd-dropdown-link']) ?>
                                                </li>
                                                <li class="rd-dropdown-item">
                                                    <?= Html::a(Yii::t('app', 'NAV_JAZZ_COMBO'),
                                                        ['/main/default/jazz-combo'], ['class' => 'rd-dropdown-link']) ?>
                                                </li>
                                                <li class="rd-dropdown-item">
                                                    <?= Html::a(Yii::t('app', 'NAV_POP_MUSIC'),
                                                        ['/main/default/pop-music'], ['class' => 'rd-dropdown-link']) ?>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="rd-nav-item rd-navbar--has-dropdown rd-navbar-submenu">
                                            <?= Html::a(Yii::t('app', 'NAV_AUDIO'), '#',
                                                ['class' => 'rd-nav-link']) ?>
                                            <!-- RD Navbar Dropdown -->
                                            <ul class="rd-menu rd-navbar-dropdown">
                                                <li class="rd-dropdown-item">
                                                    <?= Html::a(Yii::t('app', 'NAV_JINGLES'),
                                                        ['/main/default/jingles'], ['class' => 'rd-dropdown-link']) ?>
                                                </li>
                                                <li class="rd-dropdown-item">
                                                    <?= Html::a(Yii::t('app', 'NAV_STEMS'),
                                                        ['/main/default/stems'], ['class' => 'rd-dropdown-link']) ?>
                                                </li>
                                                <li class="rd-dropdown-item">
                                                    <?= Html::a(Yii::t('app', 'NAV_MINUS_ONE'),
                                                        '#', ['class' => 'rd-dropdown-link']) ?>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="rd-nav-item">
                                            <?= Html::a(Yii::t('app', 'NAV_SERVICES'), '#',
                                                ['class' => 'rd-nav-link']) ?>
                                        </li>
                                        <li class="rd-nav-item rd-navbar--has-megamenu rd-navbar-submenu">
                                            <?= Html::a(Yii::t('app', 'NAV_MATERIALS'), '#',
                                                ['class' => 'rd-nav-link']) ?>
                                            <!-- RD Navbar Megamenu-->
                                            <ul class="rd-menu rd-navbar-megamenu rd-navbar-open-right">
                                                <li class="rd-megamenu-item">
                                                    <div class="rd-megamenu-title">
                                                        <?= Yii::t('app', 'NAV_INTERESTING') ?>
                                                    </div>
                                                    <div class="rd-megamenu-block">
                                                        <ul class="rd-megamenu-list">
                                                            <li class="rd-megamenu-list-item">
                                                                <?= Html::a(Yii::t('app', 'NAV_EVENTS'),
                                                                    ['/main/default/events'],
                                                                    ['class' => 'rd-megamenu-list-link']) ?>
                                                            </li>
                                                            <li class="rd-megamenu-list-item">
                                                                <?= Html::a(Yii::t('app', 'NAV_PROJECTS'),
                                                                    ['/main/default/projects'],
                                                                    ['class' => 'rd-megamenu-list-link']) ?>
                                                            </li>
                                                            <li class="rd-megamenu-list-item">
                                                                <?= Html::a(Yii::t('app', 'NAV_PUBLICATIONS'),
                                                                    ['/main/default/publications'],
                                                                    ['class' => 'rd-megamenu-list-link']) ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="rd-megamenu-item">
                                                    <div class="rd-megamenu-title">
                                                        <?= Yii::t('app', 'NAV_ACCOUNT') ?>
                                                    </div>
                                                    <div class="rd-megamenu-block">
                                                        <ul class="rd-megamenu-list">
                                                            <?php
                                                                if (Yii::$app->user->isGuest)
                                                                    echo '<li class="rd-megamenu-list-item">' .
                                                                        Html::a(Yii::t('app', 'NAV_SIGN_IN'),
                                                                            ['/main/default/sing-in'],
                                                                            ['class' => 'rd-megamenu-list-link']) .
                                                                        '</li>';
                                                                else
                                                                    echo '<li class="rd-megamenu-list-item">' .
                                                                        Html::a(Yii::t('app', 'NAV_ADMINISTRATION'),
                                                                            ['/admin/user/profile'],
                                                                            ['class' => 'rd-megamenu-list-link']) .
                                                                        '</li><li class="rd-megamenu-list-item">' .
                                                                        Html::beginForm(['/main/default/sing-out'], 'post') .
                                                                        Html::submitButton(Yii::t('app', 'NAV_SIGN_OUT') . ' (' .
                                                                            Yii::$app->user->identity->username . ')',
                                                                            ['class' => 'sing-out-button rd-megamenu-list-link']
                                                                        ) . Html::endForm() . '</li>';
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="rd-nav-item">
                                            <?= Html::a(Yii::t('app', 'NAV_CONTACTS'), ['/main/default/contact'],
                                                ['class' => 'rd-nav-link']) ?>
                                        </li>
                                        <li class="rd-nav-item">
                                            <?= Html::a(Yii::$app->language == 'ru-RU' ?
                                                "<figure class='icon-lang icon-en'></figure>" :
                                                "<figure class='icon-lang icon-ru'></figure>",
                                                Yii::$app->language == 'ru-RU' ? '/en' .
                                                Yii::$app->getRequest()->getLangUrl() : '/ru' .
                                                    Yii::$app->getRequest()->getLangUrl(),
                                                ['class' => 'rd-nav-link']) ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <!-- Preview Section-->
            <section class="section context-dark section-jumbotron bg-cover bg-overlay-1"
                     style="background: url(/web/images/bg-image.jpg) #151515">
                <div class="panel-left">
                    <!--Brand-->
                    <?= Html::a(
                        Html::img('@web/images/logo-default-340x130.png',
                            ['class' => 'brand-logo-dark', 'width' => '137', 'height' => '49']) .
                        Html::img('@web/images/logo-inverse-246x216.png',
                            ['class' => 'brand-logo-light', 'width' => '123', 'height' => '108']),
                        ['/main/default/index'], ['class' => 'brand']) ?>
                    <ul class="list-md custom-list">
                        <li>
                            <?= Html::a('', User::find()->one()->youtube_link,
                                ['class' => 'icon icon-lg icon-gray-filled icon-circle mdi mdi-youtube-play']) ?>
                        </li>
                        <li>
                            <?= Html::a('', User::find()->one()->instagram_link,
                                ['class' => 'icon icon-lg icon-gray-filled icon-circle mdi mdi-instagram']) ?>
                        </li>
                        <li>
                            <?= Html::a('', User::find()->one()->twitter_link,
                                ['class' => 'icon icon-lg icon-gray-filled icon-circle mdi mdi-twitter']) ?>
                        </li>
                        <li>
                            <?= Html::a('', User::find()->one()->facebook_link,
                                ['class' => 'icon icon-lg icon-gray-filled icon-circle mdi mdi-facebook']) ?>
                        </li>
                        <li>
                            <?= Html::a('', User::find()->one()->vk_link,
                                ['class' => 'icon icon-lg icon-gray-filled icon-circle mdi mdi-vk']) ?>
                        </li>
                    </ul>
                </div>
                <div class="section-fullheight">
                    <div class="section-fullheight-inner section-md section-md-custom text-center text-lg-left">
                        <div class="container">
                            <div class="row justify-content-center justify-content-lg-start">
                                <div class="col-md-10 col-lg-10 col-xl-10 offset-xxl-1 col-xxl-7">
                                    <div class="jumbotron-custom-1">
                                        <div class="block-3-custom">
                                            <div class="text-1"><?= Yii::t('app', 'PROFESSION') ?></div>
                                        </div>
                                        <h2 class="jumbotron-custom-title">
                                            <span class="big">
                                                <?= Yii::$app->language == 'ru-RU' ? User::find()->one()->full_name_ru :
                                                    User::find()->one()->full_name_en ?>
                                            </span>
                                        </h2>
                                        <div class="block-4-custom">
                                            <p class="big-2 text-white-darken">
                                                <?= Yii::t('app', 'ANNOTATION') ?>
                                            </p>
                                        </div>
                                        <div class="block-4-custom offset-custom-4">
                                            <?= Html::a(Yii::t('app', 'BUTTON_READ_MORE'), '#about-me-section',
                                                ['class' => 'button button-default button-custom']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="project-list">
                    <li class="bg-image" style="background-image: url(/web/images/guitar-sheet-music-670x447.jpg)">
                        <span class="icon icon-md project-list-icon mdi mdi-music-box-outline"></span>
                        <div class="project-list-info">
                            <?= Html::a(Yii::t('app', 'PROJECT_LIST_CUSTOM_SHEET_MUSIC_TITLE'),
                                ['/main/default/sheet-music']) ?>
                            <p class="project-list-text">
                                <?= Yii::t('app', 'PROJECT_LIST_CUSTOM_SHEET_MUSIC_TEXT') ?>
                            </p>
                        </div>
                    </li>
                    <li class="bg-image" style="background-image: url(/web/images/tracks-3008x2000.jpg)">
                        <span class="icon icon-md project-list-icon mdi mdi-play-box-outline"></span>
                        <div class="project-list-info">
                            <?= Html::a(Yii::t('app', 'PROJECT_LIST_CUSTOM_AUDIO_TITLE'),
                                ['/main/default/jingles']) ?>
                            <p class="project-list-text">
                                <?= Yii::t('app', 'PROJECT_LIST_CUSTOM_AUDIO_TEXT') ?>
                            </p>
                        </div>
                    </li>
                </ul>
            </section>
        </section>

        <!-- Content Section -->
        <?= $content ?>

        <!-- Footer Section -->
        <div class="pre-footer-classic bg-gray-700 context-dark">
            <div class="container">
                <div class="row row-30 justify-content-lg-between">
                    <div class="col-sm-6 col-lg-3 col-xl-3">
                        <h5><?= Yii::t('app', 'FOOTER_LOCATION') ?></h5>
                        <ul class="list list-sm font-family-serif ls-003">
                            <li>
                                <p><?= Yii::$app->language == 'ru-RU' ? User::find()->one()->address_ru :
                                        User::find()->one()->address_en ?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <h5><?= Yii::t('app', 'FOOTER_CONTACTS') ?></h5>
                        <dl class="list-terms-custom">
                            <dt><span class="icon icon-xs mdi mdi-phone"></span></dt>
                            <dd><a class="link-default" href="tel:#"><?= User::find()->one()->phone ?></a></dd>
                        </dl>
                        <dl class="list-terms-custom">
                            <dt><span class="icon icon-xs mdi mdi-email-outline"></span></dt>
                            <dd>
                                <?php $emails = explode(", ", User::find()->one()->email);
                                    foreach ($emails as $key => $email)
                                        if ($key == 0)
                                            echo '<a class="link-default" href="mailto:' . $email . '">' .
                                                $email . '</a>';
                                ?>
                            </dd>
                        </dl>
                        <ul class="list-inline list-inline-sm">
                            <li>
                                <?= Html::a('', User::find()->one()->instagram_link,
                                    ['class' => 'icon icon-sm icon-gray-filled-white icon-circle mdi mdi-instagram']) ?>
                            </li>
                            <li>
                                <?= Html::a('', User::find()->one()->twitter_link,
                                    ['class' => 'icon icon-sm icon-gray-filled-white icon-circle mdi mdi-twitter']) ?>
                            </li>
                            <li>
                                <?= Html::a('', User::find()->one()->facebook_link,
                                    ['class' => 'icon icon-sm icon-gray-filled-white icon-circle mdi mdi-facebook']) ?>
                            </li>
                            <li>
                                <?= Html::a('', User::find()->one()->vk_link,
                                    ['class' => 'icon icon-sm icon-gray-filled-white icon-circle mdi mdi-vk']) ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5><?= Yii::t('app', 'FOOTER_NEWSLETTER') ?></h5>
                        <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact"
                              method="post" action="bat/rd-mailform.php" novalidate="novalidate">
                            <div class="form-wrap form-wrap-icon">
                                <div class="form-icon mdi mdi-email-outline"></div>
                                <input class="form-input form-control-has-validation" id="footer-email" type="email"
                                       name="email" data-constraints="@Email @Required">
                                <span class="form-validation"></span>
                                <label class="form-label rd-input-label" for="footer-email">
                                    <?= Yii::t('app', 'FOOTER_EMAIL') ?>
                                </label>
                            </div>
                            <div class="button-wrap">
                                <button class="button button-default button-invariable" type="submit">
                                    <?= Yii::t('app', 'BUTTON_SUBSCRIBE') ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="section footer-classic context-dark text-center">
            <div class="container">
                <div class="row row-15 justify-content-lg-between">
                    <div class="col-lg-4 col-xl-4 text-lg-left">
                        <p class="rights font-weight-regular">
                            <span>&copy;</span>
                            <span class="copyright-year"><?= date('Y') ?></span>
                            <span><?= Yii::$app->language == 'ru-RU' ? User::find()->one()->full_name_ru :
                                    User::find()->one()->full_name_en ?>.</span>
                            <span><?= Yii::t('app', 'FOOTER_COPYRIGHT') ?></span>
                        </p>
                    </div>
                    <div class="col-lg-5 col-xl-5">
                        <ul class="list-inline list-inline-lg text-uppercase list-footer-menu">
                            <li>
                                <?= Html::a(Yii::t('app', 'NAV_ABOUT'),
                                    '#about-me-section', ['class' => 'rd-dropdown-link']) ?>
                            </li>
                            <li>
                                <?= Html::a(Yii::t('app', 'NAV_EVENTS'),
                                    ['/main/default/events'], ['class' => 'rd-dropdown-link']) ?>
                            </li>
                            <li>
                                <?= Html::a(Yii::t('app', 'NAV_PROJECTS'),
                                    ['/main/default/projects'], ['class' => 'rd-dropdown-link']) ?>
                            </li>
                            <li>
                                <?= Html::a(Yii::t('app', 'NAV_PUBLICATIONS'),
                                    ['/main/default/publications'], ['class' => 'rd-dropdown-link']) ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 text-lg-right">
                        <?= '<a class="font-weight-regular" href="mailto:' . Yii::$app->params['adminEmail'] . '">' .
                            Yii::t('app', 'FOOTER_POWERED_BY') . ' ' . Yii::t('app', 'FOOTER_DEVELOPER') . '</a>' ?>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="snackbars" id="form-output-global"></div>

    <a href="#" id="ui-to-top" class="ui-to-top fa fa-angle-up"></a>

<?php $this->endBody() ?>
</body>

</html>

<?php $this->endPage() ?>