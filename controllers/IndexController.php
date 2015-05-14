<?php

namespace app\controllers;

use app\controllers\_extend\FrontendController;

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