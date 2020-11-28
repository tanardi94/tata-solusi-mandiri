<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class TemplateAsset extends AssetBundle
{
    public $sourcePath = '@web/themes/watch/';
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $images = '@web/themes/watch/img/';
    public $css = [
        "https://fonts.googleapis.com/css?family=Muli:300,400,700,900",
        "themes/watch/css/linearicons.css",

        "themes/watch/css/bootstrap.css",
        "themes/watch/css/font-awesome.min.css",
        "themes/watch/css/magnific-popup.css",
        "themes/watch/nice-select.css",
        "themes/watch/css/animate.min.css",

        "themes/watch/css/owl.carousel.css",

        "themes/watch/css/main.css",

        "themes/watch/fonts/flaticon/font/flaticon.css",

        "themes/watch/css/aos.css",

        "themes/watch/css/style.css",
    ];
    public $js = [
        "themes/watch/js/vendor/jquery-2.2.4.min.js",
        "themes/watch/js/hoverIntent.js",
        "themes/watch/js/superfish.min.js",
        "themes/watch/js/easing.min.js",
        "themes/watch/js/bootstrap.min.js",
        "themes/watch/js/jquery.ajaxchimp.min.js",
        "themes/watch/js/jquery.magnific-popup.min.js",
        "themes/watch/js/owl.carousel.min.js",
        "themes/watch/js/vendor/bootstrap.min.js",
        "themes/watch/js/jquery.sticky.js",
        "themes/watch/js/jquery.nice-select.min.js",
        "themes/watch/js/parallax.min.js",
        "themes/watch/js/jquery.sticky.js",
        "themes/watch/js/main.js",
        "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js",
        "https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA",
        "themes/watch/js/mail-script.js"
    ];
}
