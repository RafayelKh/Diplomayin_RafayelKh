<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody();
Yii::$app->language = 'en'
?>

<div class="wrap">
    <header class="site-navbar" role="banner">
        <div class="site-navbar-top">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                        <form action="<?= \yii\helpers\Url::to('@web') ?>/shop" class="site-block-top-search">
                            <span class="icon icon-search2"></span>
                            <form action="<?= \yii\helpers\Url::to('@web') ?>/shop">
                                <input type="text" name="s" class="form-control custom-form border-0"
                                       placeholder="Search">
                                <button class="btn btn-sm btn-primary">></button>
                            </form>
                        </form>
                    </div>

                    <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                        <div class="site-logo">
                            <a href="<?= \yii\helpers\Url::to('@web') ?>" class="js-logo-clone">Shoppers</a>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                        <div class="site-top-icons">
                            <ul>
                                <li><a href="https://twitter.com"><i class="fab fa-twitter-square icon"></i></a></li>
                                <li><a href="https://facebook.com"><i class="fab fa-facebook-square icon"></i></a></li>
                                <li><a href="<?= \yii\helpers\Url::to('@web') ?>/favorites"><i
                                                class="fas fa-heart icon"></i></a></li>
                                <li>
                                    <?php if (!Yii::$app->user->isGuest) { ?>
                                    <a href="<?= \yii\helpers\Url::to('@web') ?>/cart" class="site-cart">
                                        <span class="icon-shopping_cart">
                                            <i class="fas fa-shopping-cart icon"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to('@web') ?>/user" class="site-cart">
                                        <span class=" icon-shopping_cart">
<!--                                            <i class="fas fa-user icon"></i>-->
                                        </span>
                                    </a>
                                    <?php } ?>
                                </li>

                                <li class="d-inline-block d-md-none ml-md-0"><a href="#"
                                                                                class="site-menu-toggle js-menu-toggle"><span
                                                class="icon-menu"></span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <nav class="site-navigation text-right text-md-center" role="navigation">
            <div class="container">
                <ul class="site-menu js-clone-nav d-none d-md-block">
                    <?php

                    $menuItems = [
                        ['label' => Yii::t('app', 'home'), 'url' => ['/']],
                        ['label' => Yii::t('app', 'about'), 'url' => ["/about-us"]],
                        ['label' => Yii::t('app', 'contact'), 'url' => ['/contact']]
                    ];
                    if (!Yii::$app->user->isGuest) {
                        $menuItems[] = ['label' => Yii::t('app', 'cart'), 'url' => ['/cart']];
                    }
                    $menuItems[] = [
                        'label' => Yii::t('app', 'shop'), 'url' => ['/shop'],
                    ];
                    $menuItems[] = [
                        'label' => Yii::t('app', 'blog'), 'url' => ['/blog'],
                    ];
                    if (Yii::$app->user->isGuest) {
                        $menuItems[] = ['label' => Yii::t('app', 'sign_in'), 'url' => ['/site/login']];
                        $menuItems[] = ['label' => Yii::t('app', 'sign_up'), 'url' => ['/site/signup']];
                    } else {
                        $menuItems[] = ['label' => Yii::t('app', 'logout'), 'linkOptions' => ['data-method' => 'post'], 'url' => ['/site/logout',]];
                    }
                    echo Nav::widget([
                        'options' => ['class' => 'site-navigation text-right text-md-center'],
                        'items' => $menuItems,
                    ]);
                    ?>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>

<footer class="site-footer border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div style="font-size: 16px" class="row">
                    <div class="col-md-12">
                        <h3 class="footer-heading mb-4"><?= Yii::t('app', 'navigation') ?></h3>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?= \yii\helpers\Url::to('@web') ?>/shop"><?= Yii::t('app', 'sell_online') ?></a>
                            </li>
                            <li><a href="<?= \yii\helpers\Url::to('@web') ?>/shop"><?= Yii::t('app', 'featured') ?></a>
                            </li>
                            <?php if (!Yii::$app->user->isGuest) { ?>
                                <li><a href="<?= \yii\helpers\Url::to('@web') ?>/cart"><?= Yii::t('app', 'cart') ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?= \yii\helpers\Url::to('@web') ?>/contact"><?= Yii::t('app', 'contact') ?></a>
                            </li>
                            <li><a href="<?= \yii\helpers\Url::to('@web') ?>">Dropshipping</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('@web') ?>">Website development</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li><a href="#">Point of sale</a></li>
                            <li><a href="">Hardware</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('@web') ?>/about-us">Software</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div style="font-size: 16px" class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <h3 class="footer-heading mb-4">Promo</h3>
                <img src="<?= \yii\helpers\Url::to('@web') ?>/images/hero_1.jpg" alt="Image placeholder"
                     class="img-fluid rounded mb-4">
                <h3 class="font-weight-light  mb-0">Finding Your Perfect Shoes</h3>
                <p>Promo from nuary 15 &mdash; 25, 2019</p>
            </div>
            <div style="font-size: 16px" class="col-md-6 col-lg-3">
                <div class="block-5 mb-5">
                    <h3 class="footer-heading mb-4">Contact Info</h3>
                    <ul class="list-unstyled">
                        <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                        <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                        <li class="email">emailaddress@domain.com</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This website is made by <i class="icon-heart" aria-hidden="true"></i> by <a
                            href="#" target="_blank" class="text-primary">Rafeyel Khachatryan</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>

        </div>
    </div>
</footer>
</div>
</body>
</html>
<?php $this->endPage() ?>
