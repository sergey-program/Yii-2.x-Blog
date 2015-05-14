<?php

namespace app\modules\frontendProfile\controllers;

use app\modules\frontendProfile\controllers\_extend\AbstractController;

/**
 * Class IndexController
 *
 * @package app\modules\frontendProfile\controllers
 */
class IndexController extends AbstractController
{
    public $defaultAction = 'index';

    /**
     * @return string
     */
    public function actionIndex()
    {
        $this->getView()->setPageTitle(\Yii::t('', 'Profile'));

        return $this->render('index');
    }
}