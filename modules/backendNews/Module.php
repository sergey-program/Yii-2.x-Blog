<?php

namespace app\modules\backendNews;

use app\modules\_extend\AbstractModule;

/**
 * Class Module
 *
 * @package app\modules\backendNews
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