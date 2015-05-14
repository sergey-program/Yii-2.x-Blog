<?php

namespace app\modules\backendNewsCategories\controllers;

use app\modules\backendNewsCategories\controllers\_extend\AbstractController;

/**
 * Class IndexController
 *
 * @package app\modules\backendNewsCategories\controllers
 */
class CategoryController extends AbstractController
{
    /**
     * @return \yii\web\Response
     */
    public function actionList()
    {
        return $this->render('list');
    }
}