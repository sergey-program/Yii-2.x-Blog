<?php

namespace app\modules\_extend;

use yii\base\Module;

/**
 * Class AbstractModule
 *
 * @package app\modules\_extend
 */
abstract class AbstractModule extends Module
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