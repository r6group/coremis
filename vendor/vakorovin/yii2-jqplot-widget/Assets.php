<?php

/**
 * Yii2 jqPlot Widget
 * 
 * @link https://github.com/vakorovin/yii2-jqplot-widget
 * @license https://github.com/vakorovin/yii2-jqplot-widget/blob/master/LICENSE MIT
 * @author Vladimir Korovin <rolan1986@gmail.com>
 * @see http://www.jqplot.com
 */

namespace vakorovin\yii2_jqplot_widget;

use yii\web\AssetBundle;

class Assets extends AssetBundle{
	public $sourcePath = '@vakorovin/yii2_jqplot_widget/jquery.jqplot';

    public $js = [
        'jquery.jqplot.js',
    ];

    public $css = [
        'jquery.jqplot.css',
    ];

	public $depends = [
		'yii\web\YiiAsset',
	];
}
