<?php

namespace app\controllers\_extend;

/**
 * Class BackendController
 *
 * @package app\controllers
 */
abstract class BackendController extends AbstractController
{
    public $layout = 'frontend';

    /**
     *
     */
    public function init()
    {
        parent::init();
    }
}