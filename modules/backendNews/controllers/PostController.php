<?php

namespace app\modules\backendNews\controllers;

use app\modules\backendNews\controllers\_extend\AbstractController;

/**
 * Class PostController
 *
 * @package app\modules\backendNews\controllers
 */
class PostController extends AbstractController
{
    /**
     * @return string
     */
    public function actionList()
    {
        $mSearchPost = '';

        return $this->render('list', ['mSearchPost' => $mSearchPost]);
    }
}