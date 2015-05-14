<?php

namespace app\modules\backendNewsCategories;

use app\modules\_extend\AbstractModule;

/**
 * Class Module
 *
 * @package app\modules\backendNewsCategories
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