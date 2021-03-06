<?php

namespace app\modules\backendNewsCategories\controllers;

use app\modules\backendNewsCategories\controllers\_extend\AbstractController;

/**
 * Class IndexController
 *
 * @package app\modules\backendNewsCategories\controllers
 */
class IndexController extends AbstractController
{
    /**
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        return $this->redirect(['category/list']);
    }
}