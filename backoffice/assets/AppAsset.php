<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backoffice\assets;

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
        //'css/site.css',
        'themes/quirk/lib/Hover/hover.css',
        'themes/quirk/lib/fontawesome/css/font-awesome.css',
        //'themes/quirk/lib/weather-icons/css/weather-icons.css', //Only some page
        'themes/quirk/lib/ionicons/css/ionicons.css',
        'themes/quirk/lib/jquery-toggles/toggles-full.css',
        //'themes/quirk/lib/morrisjs/morris.css', //Only some page
        'themes/quirk/css/quirk.css',
        //'themes/quirk/css/animsition.css', //Display page transition effects apply on only some page
    ];
    public $js = [
        //'themes/quirk/lib/jquery-ui/jquery-ui.js',
        //'themes/quirk/js/jquery.animsition.js',  //Display page transition effects apply on only some page
        //'themes/quirk/lib/bootstrap/js/bootstrap.js',
        'themes/quirk/lib/jquery-toggles/toggles.js',
        //'themes/quirk/lib/morrisjs/morris.js', //Only some page
        'themes/quirk/lib/raphael/raphael.js',
        'themes/quirk/lib/flot/jquery.flot.js',
        'themes/quirk/lib/flot/jquery.flot.resize.js',
        'themes/quirk/lib/flot-spline/jquery.flot.spline.js',
        'themes/quirk/lib/jquery-knob/jquery.knob.js',
        'themes/quirk/js/quirk.js',
        //'themes/quirk/js/dashboard.js', //Only some page


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];
}

