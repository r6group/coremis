<?php

/**
 * @package   yii2-datecontrol
 * @author    shongpon Visweswaran <shongponv2@gmail.com>
 * @copyright Copyright &copy; shongpon Visweswaran, Krajee.com, 2014 - 2015
 * @version   1.9.3
 */

namespace shongpon\datecontrol;

use Yii;

/**
 * Asset bundle for DateControl Widget
 *
 * @author shongpon Visweswaran <shongponv2@gmail.com>
 * @since 1.0
 */
class DateControlAsset extends \shongpon\base\AssetBundle
{
    /**
     * @inheritdoc
     */
    public $depends = [
        'shongpon\datecontrol\DateFormatterAsset'
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('js', ['js/datecontrol']);
        parent::init();
    }
}