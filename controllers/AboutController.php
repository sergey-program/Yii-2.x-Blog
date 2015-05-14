<?php

namespace app\controllers;

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