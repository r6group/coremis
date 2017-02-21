<?php

/**
 * @copyright Copyright &copy; shongpon Visweswaran, Krajee.com, 2015
 * @package yii2-widgets
 * @subpackage yii2-widget-datepicker
 * @version 1.3.3
 */

namespace shongpon\date;

/**
 * Asset bundle for DatePicker Widget
 *
 * @author shongpon Visweswaran <shongponv2@gmail.com>
 * @since 1.0
 */
class DatePickerAsset extends \shongpon\base\AssetBundle
{
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('css', ['css/bootstrap-datepicker3', 'css/datepicker-kv']);

        $this->setupAssets('js', ['js/bootstrap-datepicker', 'js/bootstrap-datepicker']);
        //$this->setupAssets('js', ['js/bootstrap-datepicker-thai', 'js/bootstrap-datepicker-thai']);
        //$this->setupAssets('js', ['js/bootstrap-datepicker', 'js/datepicker-kv']);
        //$this->js = [];
        $this->js[] = YII_DEBUG ? 'js/bootstrap-datepicker-thai.js' : 'js/bootstrap-datepicker-thai.js';
        $this->js[] = YII_DEBUG ? 'js/datepicker-kv.js' : 'js/datepicker-kv.js';


        parent::init();
    }
}
