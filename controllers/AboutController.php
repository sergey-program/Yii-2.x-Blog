<?php

namespace app\controllers;

use app\controllers\_extend\FrontendController;

/**
 * Class ContactController
 *
 * @package app\controllers
 */
class AboutController extends FrontendController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('about');
    }
}