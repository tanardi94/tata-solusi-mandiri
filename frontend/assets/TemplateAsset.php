<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class TemplateAsset extends AssetBundle
{
    public $sourcePath = '@web/themes/unapp-master/';
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $images = '@web/themes/unapp-master/images/';
    public $css = [
        "https://fonts.googleapis.com/css?family=Muli:300,400,700,900",
        "themes/unapp-master/fonts/icomoon/style.css",

        "themes/unapp-master/css/bootstrap.min.css",
        "themes/unapp-master/css/jquery-ui.css",
        "themes/unapp-master/css/owl.carousel.min.css",
        "themes/unapp-master/css/owl.theme.default.min.css",
        "themes/unapp-master/css/owl.theme.default.min.css",

        "themes/unapp-master/css/jquery.fancybox.min.css",

        "themes/unapp-master/css/bootstrap-datepicker.css",

        "themes/unapp-master/fonts/flaticon/font/flaticon.css",

        "themes/unapp-master/css/aos.css",

        "themes/unapp-master/css/style.css",
    ];
    public $js = [
        "themes/unapp-master/js/jquery-3.3.1.min.js",
        "themes/unapp-master/js/jquery-migrate-3.0.1.min.js",
        "themes/unapp-master/js/jquery-ui.js",
        "themes/unapp-master/js/popper.min.js",
        "themes/unapp-master/js/bootstrap.min.js",
        "themes/unapp-master/js/owl.carousel.min.js",
        "themes/unapp-master/js/jquery.stellar.min.js",
        "themes/unapp-master/js/jquery.countdown.min.js",
        "themes/unapp-master/js/bootstrap-datepicker.min.js",
        "themes/unapp-master/js/jquery.easing.1.3.js",
        "themes/unapp-master/js/aos.js",
        "themes/unapp-master/js/jquery.fancybox.min.js",
        "themes/unapp-master/js/jquery.sticky.js",
        "themes/unapp-master/js/main.js",
    ];


    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
