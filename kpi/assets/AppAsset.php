<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace kpi\assets;

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
        'themes/kingadmin/css/main.css',
        'themes/kingadmin/css/font-awesome.min.css',
        'themes/kingadmin/css/skins/darkblue.css',
        'themes/kingadmin/css/my-custom-styles.css',


    ];
    public $js = [

        'themes/kingadmin/js/plugins/modernizr/modernizr.js',
        'themes/kingadmin/js/plugins/bootstrap-tour/bootstrap-tour.custom.js',
        'themes/kingadmin/js/king-common.js',
        'themes/kingadmin/js/plugins/raphael/raphael-2.1.0.min.js',
        'themes/kingadmin/js/jquery-ui/jquery-ui-1.10.4.custom.min.js',
//        'themes/kingadmin/js/plugins/stat/jquery.easypiechart.min.js',
//        'themes/kingadmin/js/plugins/stat/flot/jquery.flot.min.js',
//        'themes/kingadmin/js/plugins/stat/flot/jquery.flot.resize.min.js',
//        'themes/kingadmin/js/plugins/stat/flot/jquery.flot.time.min.js',
//        'themes/kingadmin/js/plugins/stat/flot/jquery.flot.pie.min.js',
//        'themes/kingadmin/js/plugins/stat/flot/jquery.flot.tooltip.min.js',
//        'themes/kingadmin/js/plugins/jquery-sparkline/jquery.sparkline.min.js',
//        'themes/kingadmin/js/plugins/datatable/jquery.dataTables.min.js',
//        'themes/kingadmin/js/plugins/datatable/dataTables.bootstrap.js',
//        'themes/kingadmin/js/plugins/raphael/maps/usa_states.js',
        'themes/kingadmin/js/plugins/jquery-mapael/jquery.mapael.js',
        'themes/kingadmin/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
//        'themes/kingadmin/js/king-chart-stat.js',
//        'themes/kingadmin/js/king-table.js',
        'themes/kingadmin/js/king-components.js',
//        'themes/kingadmin/js/plugins/bootstrap-multiselect/bootstrap-multiselect.js',
//        'themes/kingadmin/js/plugins/bootstrap-slider/bootstrap-slider.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',

    ];
}

