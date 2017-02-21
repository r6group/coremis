<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace scripts\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontpageAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'http://fonts.googleapis.com/css?family=Hind:400,500,300,600,700',
        'theme/global/plugins/font-awesome/css/font-awesome.min.css',
        'theme/global/plugins/simple-line-icons/simple-line-icons.min.css',
        'theme/global/plugins/bootstrap/css/bootstrap.min.css',
        'theme/global/plugins/owl.carousel/assets/owl.carousel.css',
        'theme/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css',
        'theme/global/plugins/cubeportfolio/cubeportfolio/css/cubeportfolio.min.css',
        'theme/frontend/onepage2/css/layout.css',
        'theme/frontend/layout/css/custom.css'
    ];
    public $js = [
        'theme/global/plugins/jquery.min.js',
        'theme/global/plugins/jquery-migrate.min.js',

        'theme/global/plugins/jquery.easing.js',
        'theme/global/plugins/jquery.parallax.js',
        'theme/global/plugins/smooth-scroll/smooth-scroll.js',
        'theme/global/plugins/owl.carousel/owl.carousel.min.js',

        'theme/global/plugins/cubeportfolio/cubeportfolio/js/jquery.cubeportfolio.min.js',
        'theme/frontend/onepage2/scripts/portfolio.js',

        'theme/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js' ,
        'theme/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js',
        'theme/frontend/onepage2/scripts/revo-ini.js',

        'theme/frontend/onepage2/scripts/layout.js'
    ];

}
