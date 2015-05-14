<?php

namespace app\controllers;

/**
 * Class FrontendController
 *
 * @package app\controllers
 */
abstract class FrontendController extends AbstractController
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