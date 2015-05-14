<?php

namespace app\modules\backendNews\controllers;

use app\modules\backendNews\controllers\_extend\AbstractController;

/**
 * Class IndexController
 *
 * @package app\modules\backendNews\controllers
 */
class IndexController extends AbstractController
{
    /**
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        return $this->redirect(['post/list']);
    }
}