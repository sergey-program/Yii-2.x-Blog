<?php

namespace app\modules\frontendProfile;

use app\modules\_extend\AbstractModule;

/**
 * Class Module
 *
 * @package app\modules\frontendProfile
 */
class Module extends AbstractModule
{
    /**
     *
     */
    public function init()
    {
        parent::init();

        $aConfig = [];

        \Yii::configure($this, $aConfig);
    }
}