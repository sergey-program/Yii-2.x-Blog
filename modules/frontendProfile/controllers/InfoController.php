<?php

namespace app\modules\frontendProfile\controllers;

use app\modules\frontendProfile\controllers\_extend\AbstractController;

/**
 * Class InfoController
 *
 * @package app\modules\frontendProfile\controllers
 */
class InfoController extends AbstractController
{
    public $defaultAction = 'index';

    /**
     * @return string
     */
    public function actionIndex()
    {
        $this->getView()
            ->setPageTitle(\Yii::t('', 'Profile') . ' :: ' . \Yii::t('', 'My information'))
            ->addBread(['label' => \Yii::t('', 'My information')]);

        return $this->render('index');
    }
}