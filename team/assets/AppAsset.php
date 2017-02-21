<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace team\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //Vendor CSS
        'http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light',
        //'theme/vendor/bootstrap/css/bootstrap.min.css',
        'theme/vendor/font-awesome/css/font-awesome.min.css',
        'theme/vendor/simple-line-icons/css/simple-line-icons.min.css',
        'theme/vendor/owl.carousel/assets/owl.carousel.min.css',
        'theme/vendor/owl.carousel/assets/owl.theme.default.min.css',
        'theme/vendor/magnific-popup/magnific-popup.min.css',

        //Theme CSS
        'theme/css/theme.css',
        'theme/css/theme-elements.css',
        'theme/css/theme-blog.css',
        'theme/css/theme-shop.css',
        'theme/css/theme-animate.css',

        //Current Page CSS
        'theme/vendor/rs-plugin/css/settings.css',
        'theme/vendor/rs-plugin/css/layers.css',
        'theme/vendor/rs-plugin/css/navigation.css',
        'theme/vendor/circle-flip-slideshow/css/component.css',

        //Skin CSS
        'theme/css/skins/default.css',

        //Theme Custom CSS
        'theme/css/custom.css',


    ];
    public $js = [
        //Head Libs
        'theme/vendor/modernizr/modernizr.min.js',

        //Vendor
        'theme/vendor/jquery.appear/jquery.appear.min.js',
        'theme/vendor/jquery.easing/jquery.easing.min.js',
        'theme/vendor/jquery-cookie/jquery-cookie.min.js',
        //'theme/vendor/bootstrap/js/bootstrap.min.js',
        'theme/vendor/common/common.min.js',
        'theme/vendor/jquery.validation/jquery.validation.min.js',
        'theme/vendor/jquery.stellar/jquery.stellar.min.js',
        'theme/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js',
        'theme/vendor/jquery.gmap/jquery.gmap.min.js',
        'theme/vendor/jquery.lazyload/jquery.lazyload.min.js',
        'theme/vendor/isotope/jquery.isotope.min.js',
        'theme/vendor/owl.carousel/owl.carousel.min.js',
        'theme/vendor/magnific-popup/jquery.magnific-popup.min.js',
        'theme/vendor/vide/vide.min.js',

        //Theme Base, Components and Settings
        'theme/js/theme.js',

        //Current Page Vendor and Views
        'theme/vendor/rs-plugin/js/jquery.themepunch.tools.min.js',
        'theme/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js',
        'theme/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js',
        'theme/js/views/view.home.js',

        //Theme Custom
        'theme/js/custom.js',

        'theme/js/theme.init.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];
}

