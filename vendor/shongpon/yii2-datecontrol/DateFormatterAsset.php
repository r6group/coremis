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
 * Asset bundle for PHP Date Formatter
 *
 * @author shongpon Visweswaran <shongponv2@gmail.com>
 * @since 1.0
 */
class DateFormatterAsset extends \shongpon\base\AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath('@vendor/shongpon-v/php-date-formatter');
        $this->setupAssets('js', ['js/php-date-formatter']);
        parent::init();
    }
}