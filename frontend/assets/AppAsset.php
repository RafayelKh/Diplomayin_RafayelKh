<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'css/magnific-popup.css',
        'css/jquery-ui.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.min.css',
        'css/aos.css',
        'css/style.css',
        'css/profile.css',
        'css/demo.css',
    ];
    public $js = [
        'js/jquery-3.3.1.min.js',
        'js/jquery-ui.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/owl.carousel.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/aos.js',
        'js/main.js',
        'js/slick.min.js',
        '//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js',
        '//code.jquery.com/jquery-1.11.1.min.js',
        'js/demo.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
