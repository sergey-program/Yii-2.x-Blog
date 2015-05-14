<?php

namespace app\controllers;

/**
 * Class IndexController
 *
 * @package app\controllers
 */
class IndexController extends FrontendController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}